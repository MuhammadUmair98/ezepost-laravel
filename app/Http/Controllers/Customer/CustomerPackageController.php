<?php


namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VepostTracking;
use Carbon\Carbon;
use Inertia\Inertia;

class CustomerPackageController extends Controller
{
    //

    public function packagesSentToday(Request $request)
    {
        $model = new VepostTracking;
        if ($request->search) {
            $model->where("file_name", "LIKE", "%" . $request->search . "%");
        }
        $username = $request->user()->username;
        $vendor_trackings = VepostTracking::where('sender_username', $username)->whereDate('time_send_end', Carbon::now())->paginate(10);
        return Inertia::render(
            'customers/Packages',
            [
                'headText' => 'Packages Sent',
                'packages' => $vendor_trackings
            ]
        );
    }


    public function packagesViewedToday()
    {
    }


    public function packagesRecievedToday(Request $request)
    {
        $model = new VepostTracking;
        if ($request->search) {
            $model->where("file_name", "LIKE", "%" . $request->search . "%");
        }
        $username = $request->user()->username;
        $vendor_trackings = VepostTracking::where('receiver_username', $username)->whereDate('time_send_end', Carbon::now())->paginate(10);
        return Inertia::render(
            'customers/Packages',
            [
                'headText' => 'Packages Received',
                'packages' => $vendor_trackings
            ]
        );
    }
}
