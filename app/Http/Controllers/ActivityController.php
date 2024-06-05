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
        $imagePath = 'default.png';
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imagePath = $image->store('activity_images', 'public');

            echo $imagePath;
        }

        Activities::create([
            'title' => $request->title,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'picture' => $imagePath,
            'status' => null,
        ]);
        return redirect('activity-admin')->with('success', 'Activity created successfully');
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
