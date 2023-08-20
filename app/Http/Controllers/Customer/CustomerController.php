<?php

namespace App\Http\Controllers\Customer;

use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('customers/Index', [
            'customers' => User::where('user_type', UserType::TYPE_CUSTOMER)
                ->orderBy('created_at')
                // ->filter(FacadesRequest::only('search'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($customer) => [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'username' => $customer->username,
                    'phone' => $customer->phone,
                ]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the page with info.
     */
    public function edit($id)
    {
        $customer = User::find($id);

        if (!$customer || $customer->user_type !== UserType::TYPE_CUSTOMER) {
            return redirect()->route('home')->with('error', 'Customer not found.');
        }

        return Inertia::render('customers/Edit', [
            'customer' => [
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'username' => $customer->username,
                'phone' => $customer->phone,
            ],
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer = User::find($id);

        if (!$customer || $customer->user_type !== UserType::TYPE_CUSTOMER) {
            return redirect()->route('home')->with('error', 'Customer not found.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->save();

        return redirect()->route('customer.edit', ['id' => $customer->id])->with('success', 'Customer updated successfully.');
    }

}
