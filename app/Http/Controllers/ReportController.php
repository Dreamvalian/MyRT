<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

class ReportController extends Controller
{
    public function index()
    {
        $data['report'] = reports::all();
        return view('pages.admin-pages.report-admin', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        reports::create($input);
        return redirect()->route('report-admin.index')->with('success', 'Report added successfully.');
    }

    public function check($report_id)
    {
        $report = reports::find($report_id);
        if ($report) {
            $report->status = 'checked';
            $report->save();
        }
        return redirect()->back()->with('success', 'Report checked successfully.');
    }

    public function reject($report_id)
    {
        $report = reports::find($report_id);
        if ($report) {
            $report->status = 'rejected';
            $report->save();
        }
        return redirect()->back()->with('success', 'Report rejected successfully.');
    }
}
