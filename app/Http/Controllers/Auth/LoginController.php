<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {

            if ($user->role == 'ADMIN') {

                // return redirect()->intended('admin');
                return redirect()->intended('home-admin');
            } else if ($user->role == 'USER') {
                // return redirect()->intended('user');
                return redirect()->intended('home-user');
            }
        }

        return view('pages.login');
    }

    public function loginProcess(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user->role === 'ADMIN') {
                return redirect()->intended('home-admin');
                // return redirect()->intended('admin');
            } else if ($user->role === 'USER') {
                return redirect()->intended('home-user');
                // return redirect()->intended('user');
            }
            return redirect()->intended('/');
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }
}
