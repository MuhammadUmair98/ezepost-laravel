<?php

namespace App\Http\Controllers\Customer;

use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class CustomerController extends Controller
{

    public function __invoke(Request $request)
    {
        $customer_count =0;

        $total_packages =0;

        $viewed_packages = 0;

        return Inertia::render('customerViews/customerDashboard', [
            'customerCount' => $customer_count,
            'totalPackages' => $total_packages,
            'viewedOnce' => $viewed_packages

        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = new User;
        if (isset($request->search)) {
            $user = $user->where('username', 'LIKE', '%' . $request->search . '%');
        }
        return Inertia::render('customers/Index', [
            'customers' => $user->where('user_type', UserType::TYPE_CUSTOMER)->orderBy('created_at')
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
        $customer = User::findOrFail($id);
        $packages =  DB::table('vepost_tracking')->where('sender_username', $customer->username)->get();
        return Inertia::render('customers/Edit', [
            'customer' => [
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'username' => $customer->username,
                'phone' => $customer->phone,
            ],
            'packages' => $packages->map(function ($package) {
                return [
                    's_name' => $package->sender_displayname,
                    'fileName' => $package->file_name,
                    'fileSizeTransfer' => $package->file_size_transfer,
                    'senderOS' => $package->sender_OS,
                    'senderDeviceName' => $package->sender_device_name,
                    'r_name' => $package->receiver_displayname,
                    'receiverOS' => $package->receiver_OS,
                    'receiverDeviceName' => $package->receiver_device_name,
                    'senttime' => $package->time_send_start,
                ];
            })
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
