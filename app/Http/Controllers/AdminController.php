<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\Sarpras;
use App\Models\TahunAjar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminController extends Controller
{
    function index(): View
    {   
        $datas = User::where('role', 'staff')->select('id','pfp','nip', 'name', 'email', 'phone', 'created_at')->get();
        return view('admin.home', compact('datas'));
    }
    
    function tambahAkun(){ //fungsi untuk ke halaman admin tambah akun 
        return view('admin/tambahAkun');
    }

    function setAkun(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'nip' => 'required|numeric|unique:users,nip|between:0,999999999999', //validasi 20 digit nya masih kelewat
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
            $originalNameWithoutExtension = pathinfo($request->file('picture')->getClientOriginalName(), PATHINFO_FILENAME);//ketika akan dihash maka aaka akan berbeda jika tidak pake pathfile
            $extension = $request->file('picture')->getClientOriginalExtension();
            $picture = time().'_'.hash('sha256',$originalNameWithoutExtension).'.'.$extension;
            $request->file('picture')->storeAs('public/profile', $picture);
            $imagePath = "storage/profile/".$picture;
        } else {
            $imagePath = 'image/default_profile.png';
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

        return redirect()->route('admin.home')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    function detailAkun(string $id): View
    {
        $user = User::findOrFail($id);
        return view('admin/detailAkun', compact('user'));
    }

    function editAkun(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'nip' => ['required','numeric','digits_between:1,2147483647',Rule::unique('users')->ignore($id),],
            'nama' => 'required|max:255',
            'email' => ['required','max:255',Rule::unique('users')->ignore($id),],
            'nomor_telepon' => 'required|max:255',
            'password' => 'nullable|min:8|max:255'
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
            'password.min' => 'password tidak boleh kurang dari 8 karakter',
            'password.max' => 'password tidak boleh lebih dari 255 karakter',
        ]);

        $user = User::findOrFail($id);
        if($request->hasFile('picture')){
            $originalNameWithoutExtension = pathinfo($request->file('picture')->getClientOriginalName(), PATHINFO_FILENAME);//ketika akan dihash maka aaka akan berbeda jika tidak pake pathfile
            $extension = $request->file('picture')->getClientOriginalExtension();
            $picture = time().'_'.hash('sha256',$originalNameWithoutExtension).'.'.$extension;
            $request->file('picture')->storeAs('public/profile', $picture);
            $imagePath = "storage/profile/".$picture;
            
            $pfp = str_replace('storage/', '', $user->pfp);
            Storage::delete('public/'. $pfp);
                
            if($request->filled('password')){
                $user->update([
                    'pfp' => $imagePath,
                    'nip' => $request->nip,
                    'name' => $request->nama,
                    'email' => $request->email,
                    'phone' => $request->nomor_telepon,
                    'password' => bcrypt($request->password)
                ]);
            }else{
                $user->update([
                    'pfp' => $imagePath,
                    'nip' => $request->nip,
                    'name' => $request->nama,
                    'email' => $request->email,
                    'phone' => $request->nomor_telepon,
                ]);
            }  
        }else{
            if($request->filled('password')){
                $user->update([
                    'nip' => $request->nip,
                    'name' => $request->nama,
                    'email' => $request->email,
                    'phone' => $request->nomor_telepon,
                    'password' => bcrypt($request->password)
                ]);
            }else{
                $user->update([
                    'nip' => $request->nip,
                    'name' => $request->nama,
                    'email' => $request->email,
                    'phone' => $request->nomor_telepon,
                ]);
            }
        }
    
        return redirect()->route('admin.detail-akun', ['id' => $id])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    function remove($id){
        $user = User::findOrFail($id);
        $pfp = str_replace('storage/', '', $user->pfp);
        Storage::delete('public/'. $pfp);
 
        $user->delete();
 
        return redirect()->route('admin.home')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    function tahunAjar(){ 
        $datas = TahunAjar::orderBy('tahunAjar1')->orderBy('tahunAjar2')->get();
        return view('admin.tahunAjar', compact('datas'));
    }

    function tambahTahun(Request $request): RedirectResponse{ 
        $this->validate($request, [
            'tahun_ajar1' => 'required|integer|min:1|unique:tahun_ajar,tahunAjar1',
            'tahun_ajar2' => 'required|integer|min:1|unique:tahun_ajar,tahunAjar2',
        ],[
            'tahun_ajar1.required' => 'Tahun Ajar pertama harus diisi.',
            'tahun_ajar1.integer' => 'Tahun Ajar pertama harus berupa bilangan bulat.',
            'tahun_ajar1.min' => 'Tahun Ajar pertama tidak boleh lebih kecil dari 1.',
            'tahun_ajar1.unique' => 'Tahun Ajar pertama sudah ada dalam database.',
        
            'tahun_ajar2.required' => 'Tahun Ajar kedua harus diisi.',
            'tahun_ajar2.integer' => 'Tahun Ajar kedua harus berupa bilangan bulat.',
            'tahun_ajar2.min' => 'Tahun Ajar kedua tidak boleh lebih kecil dari 1.',
            'tahun_ajar2.unique' => 'Tahun Ajar kedua sudah ada dalam database.',
        ]);
        

        if ($request->tahun_ajar1 >= $request->tahun_ajar2) {
            return redirect()->back()->withErrors(['tahun_ajar1' => 'Tahun Ajar 1 tidak boleh lebih besar atau sama dengan Tahun Ajar 2'])->withInput();
        }

        if (($request->tahun_ajar2 - $request->tahun_ajar1) > 1) {
            return redirect()->back()->withErrors(['tahun_ajar2' => 'Selisih antara Tahun Ajar 1 dan Tahun Ajar 2 tidak boleh lebih dari satu tahun'])->withInput();
        }

        TahunAjar::create([
            'tahunAjar1' => $request->tahun_ajar1,
            'tahunAjar2' => $request->tahun_ajar2,
        ]);
        
        return redirect()->route('admin.kelolaTahun')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    function hapusTahun($id){ 
        Rekap::where('id_thnAjar', $id)->delete();
        Sarpras::where('id_thnAjar', $id)->delete();
        TahunAjar::findOrFail($id)->delete();
        return redirect()->route('admin.kelolaTahun')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
    function ubahTahun($id){ 
        $datas = TahunAjar::orderBy('tahunAjar1')->orderBy('tahunAjar2')->get();
        $value = TahunAjar::findOrFail($id);
        return view('admin.ubah_tahunAjar', compact('datas', 'value'));
    }

    function updateTahun(Request $request, $id): RedirectResponse{ 
        $this->validate($request, [
            'tahun_ajar1' => 'required|integer|min:1|unique:tahun_ajar,tahunAjar1',
            'tahun_ajar2' => 'required|integer|min:1|unique:tahun_ajar,tahunAjar2',
        ],[
            'tahun_ajar1.required' => 'Tahun Ajar pertama harus diisi.',
            'tahun_ajar1.integer' => 'Tahun Ajar pertama harus berupa bilangan bulat.',
            'tahun_ajar1.min' => 'Tahun Ajar pertama tidak boleh lebih kecil dari 1.',
            'tahun_ajar1.unique' => 'Tahun Ajar pertama sudah ada dalam database.',
        
            'tahun_ajar2.required' => 'Tahun Ajar kedua harus diisi.',
            'tahun_ajar2.integer' => 'Tahun Ajar kedua harus berupa bilangan bulat.',
            'tahun_ajar2.min' => 'Tahun Ajar kedua tidak boleh lebih kecil dari 1.',
            'tahun_ajar2.unique' => 'Tahun Ajar kedua sudah ada dalam database.',
        ]);

        if ($request->tahun_ajar1 >= $request->tahun_ajar2) {
            return redirect()->back()->withErrors(['tahun_ajar1' => 'Tahun Ajar 1 tidak boleh lebih besar atau sama dengan Tahun Ajar 2'])->withInput();
        }

        if (($request->tahun_ajar2 - $request->tahun_ajar1) > 1) {
            return redirect()->back()->withErrors(['tahun_ajar2' => 'Selisih antara Tahun Ajar 1 dan Tahun Ajar 2 tidak boleh lebih dari satu tahun'])->withInput();
        }

        $tahunAjar = TahunAjar::findOrFail($id);
        $tahunAjar->tahunAjar1 = $request->tahun_ajar1;
        $tahunAjar->tahunAjar2 = $request->tahun_ajar2;
        $tahunAjar->save();
        
        return redirect()->route('admin.kelolaTahun')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    function profile(){
        return view('admin/profile');
    }
}