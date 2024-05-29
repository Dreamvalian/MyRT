<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreprodukRequest;
use App\Models\residents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentsController extends Controller
{
    public function index()
    {
        $data['residents'] = residents::all();

        return view('pages.admin-pages.home-admin', $data);
    }

    public function create()
    {
        return view('pages.admin-pages.add-resident-admin');
    }

    public function store(Request $request)
    {
        $data['residents'] = residents::all();
        $input = $request->all();
        residents::create($input);
        return view('pages.admin-pages.home-admin', $data);
    }

    public function show($id)
    {
        $residents = residents::findOrFail($id);
        return view('pages.admin-pages.home-admin', compact('residents'));
    }
}
