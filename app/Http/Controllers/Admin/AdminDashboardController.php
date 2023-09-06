<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\User;
use App\Enums\UserType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $customer_count = User::where('user_type', UserType::TYPE_CUSTOMER)->count();

        $total_packages = DB::table('vepost_tracking')->count();

        $viewed_packages = DB::table('vepost_tracking')->whereNotNull('time_post_opened')->count();

        return Inertia::render('adminviews/AdminDashboard', [
            'customerCount' => $customer_count,
            'totalPackages' => $total_packages,
            'viewedOnce' => $viewed_packages

        ]);
    }

    public function blockCustomer(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $controlstring = $user->controlstring;
        $controlstring[0] = '0';
        $user->controlstring = $controlstring; // Update the control string
        $user->save();  // Save the updated user info
        return Redirect::back()->with('error', 'The customer account has been blocked');
    }

    public function unblockCustomer(Request $request, int $id)
{
    $user = User::findOrFail($id);
    $controlstring = $user->controlstring;
    $controlstring[0] = '1';
    $user->controlstring = $controlstring;
    $user->save();
    return Redirect::back()->with('success', 'The customer account has been unblocked');
}
}
