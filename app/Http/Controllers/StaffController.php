<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index()
    {
        $sekolahs = Sekolah::with(['sarpras', 'rekap'])->get();
        return view('staff.home', compact('sekolahs'));
    }
    function tambahSekolah(){
        
        
        return view('staff.inputsekolah');
    }
    function profile(){
        return view('staff.profile');
    }
}