<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {
        // nama, nik, email, nomor_kk, password, nomor_telepon
        /* 
        Validation
        */
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:users',
            'nomor_kk' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nomor_telepon' => 'required',
        ]);

        /*
        Database Insert
        */
        $user = User::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nomor_kk' => $request->nomor_kk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        Auth::login($user);

        if ($user->role === 'ADMIN') {
            return redirect()->route('home-admin');
        } else {
            return redirect()->route('home-user');
        }
    }
}
