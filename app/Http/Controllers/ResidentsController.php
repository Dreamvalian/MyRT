<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResidentsController extends Controller
{
    public function index()
    {
        $residents = Residents::all();
        return view('pages.admin-pages.home-admin', compact('residents'));
    }

    public function create()
    {
        return view('pages.admin-pages.add-resident-admin');
    }

    public function store(Request $request)
    {

        $input = $request->all();
        Residents::create($input);

        return redirect('home-admin')->with('success', 'Resident created successfully');
    }


    // Method untuk menangani impor CSV
    public function importCSV(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csvFile' => 'required|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        if ($request->hasFile('csvFile')) {
            $file = $request->file('csvFile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('csv', $fileName);

            // Di sini Anda dapat melakukan pemrosesan tambahan jika diperlukan, misalnya membaca file CSV dan memasukkan datanya ke dalam database.

            return redirect()->route('home-admin')->with('success', 'CSV file has been imported successfully.');
        }

        return response()->json(['error' => 'File not found.']);
    }
}
