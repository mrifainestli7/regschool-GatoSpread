<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin/home');
    }
    function tambahAkun(){ //fungsi untuk ke halaman admin tambah akun 
        return view('admin/tambahAkun');
    }
    function profile(){
        return view('admin/profile');
    }
}