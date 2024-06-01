<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use App\Models\Residents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->nomor_kk);
        $family['family'] = Residents::where('nomor_kk', Auth::user()->nomor_kk)->get();
        $visitor['visitor'] = Reports::where('user_id', Auth::user()->user_id)->where('type_report', 'Tamu')->get();
        $data = [
            'family' => $family,
            'visitors' => $visitor
        ];

        return view('pages.user-pages.home-user', $data);
    }
}
