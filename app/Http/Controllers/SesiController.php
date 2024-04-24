<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ], [
            'nip.required' => 'nip wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infoLogin = [
            'nip' => $request->nip,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin'){
                return redirect('admin/home');
                exit();
            } elseif(Auth::user()->role == 'staff'){
                return redirect('staff/home');
                exit();
            }
        } else {
            return redirect('login')->withErrors('Username atau password tidak valid')->withInput();
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}