<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\User;
use App\Enums\UserType;

class AdminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $customerCount = User::where('user_type', UserType::TYPE_CUSTOMER)->count();

        $recentCustomers = User::where('user_type', UserType::TYPE_CUSTOMER)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();


        return Inertia::render('adminviews/AdminDashboard', [
            'customerCount' => $customerCount,
            'recentCustomers' => $recentCustomers,
        ]);
    }
}
