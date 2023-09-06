<?php

namespace App\Http\Controllers;

use App\Models\VepostTracking;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index(Request $request)
    {
        $file = VepostTracking::findOrFail($request->id);
        $data = ['file' => $file];
        $pdf = PDF::loadView('file_transfer', $data);
        return $pdf->download('vepost_tracking.pdf');
    }

    public function view(Request $request)
    {
        $file = VepostTracking::findOrFail($request->id);
        $data = ['file' => $file];
        $pdf = PDF::loadView('file_transfer', $data);
        return $pdf->stream('vepost_tracking.pdf');
    }
}
