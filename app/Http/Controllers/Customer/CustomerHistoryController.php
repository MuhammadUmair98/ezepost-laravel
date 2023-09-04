<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VepostTracking;
use Carbon\Carbon;
use Inertia\Inertia;


class CustomerHistoryController extends Controller
{
    public function packagesSentHistory(Request $request)
    {
        $model = new VepostTracking;
        if ($request->search) {
            $model =   $model->where("file_name", "LIKE", "%" . $request->search . "%");
        }
        $username = $request->user()->username;
        $vendor_trackings =  $model->where('sender_username', $username)->orderBy('ltime_send_end', 'desc')->paginate(10);
        return Inertia::render(
            'customers/Packages',
            [
                'headText' => 'Packages Sent',
                'packages' => $vendor_trackings,
                'url' => '/customer/sent/history',
            ]
        );
    }


    public function packagesViewedHistory(Request $request)
    {
        $model = new VepostTracking;
        if ($request->search) {
            $model =    $model->where("file_name", "LIKE", "%" . $request->search . "%");
        }
        $username = $request->user()->username;
        $vendor_trackings = $model
        ->where(function($query) use ($username) {
            $query->where('receiver_username', $username)
                  ->orWhere('sender_username', $username);
        })
        ->whereNotNull('time_post_opened')
        ->orderBy('time_post_opened', 'desc') // Order by ltime_send_end in descending order
        ->paginate(10);
        return Inertia::render(
            'customers/Packages',
            [
                'headText' => 'Packages Viewed',
                'packages' => $vendor_trackings,
                'url' => '/customer/viewed/history',
            ]
        );
    }


    public function packagesRecievedHistory(Request $request)
    {
        $model = new VepostTracking;
        if ($request->search) {
            $model = $model->where("file_name", "LIKE", "%" . $request->search . "%");
        }
        $username = $request->user()->username;
        $vendor_trackings = $model->where('receiver_username', $username)->orderBy('ltime_recv_end', 'desc')->paginate(10);
        return Inertia::render(
            'customers/Packages',
            [
                'headText' => 'Packages Received',
                'packages' => $vendor_trackings,
                'url' => '/customer/received/history',
            ]
        );
    }
}
