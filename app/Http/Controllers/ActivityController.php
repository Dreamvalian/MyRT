<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $data['activities'] = Activities::all();
        return view('pages.admin-pages.activity-admin', $data);
    }

    public function create()
    {
        return view('pages.admin-pages.add-activity-admin');
    }

    public function store(Request $request)
    {
        $data['activities'] = activities::all();
        $input = $request->all();
        activities::create($input);
        return view('pages.admin-pages.activity-admin', $data)->with('success', 'Activity created successfully');
    }

    public function show($activity_id)
    {
        $activities = Activities::findOrFail($activity_id);
        return view('pages.admin-pages.edit-activity-admin', compact('activities'));
    }

    public function edit($activity_id)
    {
        $activities = Activities::where('activity_id', $activity_id)->firstOrFail();
        return view('pages.admin-pages.edit-activity-admin', compact('activities'));
    }

    public function update(Request $request, $activity_id)
    {
        $activities = Activities::findOrFail($activity_id);
        $input = $request->all();
        $activities->update($input);
        return redirect('activity-admin')->with('success', 'Activity updated successfully');
    }

    public function destroy($activity_id)
    {
        $activities = activities::findOrFail($activity_id);
        $activities->delete();
        return redirect('activity-admin')->with('success', 'Activity deleted');
    }
}
