<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residents;
use Illuminate\Support\Facades\Auth;

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
        // dd(Residents::where('nik', $request->nik)->exists());
        if (Residents::where('nik', $request->nik)->exists()) {
            return redirect('home-admin')->withErrors(['create_error'=>'NIK is already exist !']);
        } else {
            Residents::create([
                'nik' => $request['nik'],
                'nomor_kk' => $request['nomor_kk'],
                'nama_lengkap' => $request['nama_lengkap'],
                'alamat' => $request['alamat'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'agama' => $request['agama'],
                'pendidikan' => $request['pendidikan'],
                'jenis_pekerjaan' => $request['jenis_pekerjaan'],
                'status_perkawinan' => $request['status_perkawinan']
            ]);

            return redirect()->back()->with('success', 'Resident added successfully.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
