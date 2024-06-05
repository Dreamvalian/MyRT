<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $data['reports'] = Reports::select('type_report', DB::raw('COUNT(*) AS count'))->groupBy('type_report')->get();


        return view('pages.admin-pages.charts', $data);
    }
}
