<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function packagesRecievedToday(Request $request)
    {

        $packages_today =  DB::table('vepost_tracking')->when(isset($request->search), function ($query) use ($request) {
            $query->where('file_name', 'LIKE', '%' . $request->search . '%');
        })->whereDate('time_send_end', Carbon::now())->paginate(10)->withQueryString()->through(fn ($item) => [
            'id' => $item->id,
            'fileName' => $item->file_name,
            'senderName' => $item->sender_username,
            'recieverName' => $item->receiver_username,
            'fileSize' => $item->file_size_transfer,
            'recievedDate' => Carbon::parse($item->time_send_end)->format('M d Y')
        ]);

        return Inertia::render('adminviews/PackagesNow', [
            'packagesToday' => $packages_today,
        ]);
    }


    public function packagesHistory(Request $request)
    {

        $packages_history =  DB::table('vepost_tracking')->when(isset($request->search), function ($query) use ($request) {
            $query->where('file_name', 'LIKE', '%' . $request->search . '%')->orWhere('sender_username', "LIKE", "%" . $request->search . "%");
        })->paginate(10)->withQueryString()->through(fn ($item) => [
            'id' => $item->id,
            'fileName' => $item->file_name,
            'senderName' => $item->sender_username,
            'recieverName' => $item->receiver_username,
            'fileSize' => $item->file_size_transfer,
            'recievedDate' => Carbon::parse($item->time_send_end)->format('M d Y')
        ]);

        return Inertia::render('adminviews/PackagesHistory', [
            'packagesHistory' => $packages_history,
        ]);
    }
}
