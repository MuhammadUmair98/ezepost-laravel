<?php

namespace App\Http\Controllers;

use App\Models\Usertopup;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Exceptions\IncompletePayment;

class UsertopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alltopup = Usertopup::select('id', 'amount', 'currency')->where(array('is_topup' => 1, 'user_id' => auth()->id()))->get();

        $sumofamount = ['Pound' => 0, 'Euro' => 0, 'Dollar' => 0];

        if(!empty($alltopup) && count($alltopup) > 0) {
            $sumofamount['Pound'] = $alltopup->where('currency', 'GBP')->sum('amount') / 100;
            $sumofamount['Euro'] = $alltopup->where('currency', 'EUR')->sum('amount') / 100;
            $sumofamount['Dollar'] = $alltopup->where('currency', 'USD')->sum('amount') / 100;
        }

        return inertia::render('customerViews/customerTopup', [
            'SKey' => env('STRIPE_KEY'),
            'TotalTopup' => $sumofamount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(empty($request->currency)) return response()->error(false, 400);
        if(empty($request->amount)) return response()->error(false, 400);
        if(empty($request->paymentMethod)) return response()->error(false, 400);

        $amount = $request->amount * 100;

        try {
            $request->user()->createOrGetStripeCustomer();

            $request->user()->charge($amount, $request->paymentMethod, ['currency' => strtolower($request->currency)]);

            Usertopup::create([
                'user_id' => auth()->id(),
                'currency' => $request->currency,
                'amount' => $request->amount * 100,
                'is_topup' => 1
            ]);

            return response()->success([
                'data1' => '',
                'data2' => '',
                'data3' => '',
                'data4' => true
            ]);
        } catch (IncompletePayment $exception) {
            return response()->success([
                'data1' => $exception->payment->id,
                'data2' => '/customer/top-up',
                'data3' => $exception->payment->status,
                'data4' => ''
            ]);
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usertopup $usertopup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usertopup $usertopup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usertopup $usertopup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usertopup $usertopup)
    {
        //
    }
}
