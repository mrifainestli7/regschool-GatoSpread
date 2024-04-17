<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index()
    {
        return view('staff.home');
    }
    function tambahSekolah(){
        return view('staff.inputsekolah');
    }
    function profile(){
        return view('staff.profile');
    }
}