<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    function index(): View
    {   
        $datas = User::where('role', 'staff')->select('pfp','nip', 'name', 'email', 'created_at')->get();
        return view('admin/home', compact('datas'));
    }
    
    function tambahAkun(){ //fungsi untuk ke halaman admin tambah akun 
        return view('admin/tambahAkun');
    }

    function setAkun(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'nip' => 'required|numeric|unique:users,nip|digits_between:1,2147483647',
            'nama' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'nomor_telepon' => 'required|max:255',
            'password' => 'required|min:8|max:255'
        ],[
            'picture.image' => 'file harus gambar',
            'picture.mimes' => 'format gambar harus jpeg,jpg, atau png',
            'picture.max' => 'ukuran gambar harus kurang dari 5 MB',
            'nip.required' => 'nip wajib diisi',
            'nip.numeric' => 'nip harus angka',
            'nip.digits_between' => 'nip tidak boleh lebih dari 2147483647 karakter',
            'nip.unique' => 'nip sudah dipakai',
            'nama.required' => 'nama wajib diisi',
            'nama.max' => 'nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'email wajib diisi',
            'email.max' => 'email tidak boleh lebih dari 255 karakter',
            'email.unique' => 'email sudah dipakai',
            'nomor_telepon.required' => 'nomor telepone wajib diisi',
            'nomor_telepon.max' => 'nomor telepone tidak boleh lebih dari 255 karakter',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'password tidak boleh kurang dari 8 karakter',
            'password.max' => 'password tidak boleh lebih dari 255 karakter',
        ]);
        
        if($request->hasFile('picture')){
            $picture = time().'_'.$request->file('picture')->getClientOriginalName();
            $imagePath = $request->file('picture')->storeAs('public/storage/profile', $picture);
        } else {
            $imagePath = 'image/profile.png';
        }
        
        User::create([
            'pfp' => $imagePath,
            'nip' => $request->nip,
            'name' => $request->nama,
            'email' => $request->email,
            'phone' => $request->nomor_telepon,
            'role' => 'staff',
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('tambah-akun')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    function profile(){
        return view('admin/profile');
    }
}