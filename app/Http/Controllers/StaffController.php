<?php

namespace App\Http\Controllers;
use App\Models\Kecamatan;
use App\Models\Rekap;
use App\Models\Sarpras;
use App\Models\Sekolah;
use App\Models\TahunAjar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index(){
        $kecamatans = Kecamatan::with('sekolah')->get();
        return view('staff.home', compact('kecamatans'));
    }

    function daftarSekolah($id_Kec, $id_thnAjar = null){
        $kecamatan = Kecamatan::findOrFail($id_Kec);  
        if ($id_thnAjar) {
            $tahunAjar = TahunAjar::where('id_thnAjar', $id_thnAjar)->first();
        } else {
            $tahunAjar = TahunAjar::orderBy('id_thnAjar', 'desc')->first();
        }
        if (!$kecamatan || !$tahunAjar) {abort(404,);}
        
        $listTahunAjar = TahunAjar::all();
        
        $sekolahs = Sekolah::with(['sarpras' => function ($query) use ($tahunAjar) {
            $query->where('id_thnAjar', $tahunAjar->id_thnAjar);
        }, 'rekap' => function ($query) use ($tahunAjar) {
            $query->where('id_thnAjar', $tahunAjar->id_thnAjar);
        }])
        ->where('id_kecamatan', $id_Kec)
        ->get();
        
        return view('staff.daftar_sekolah', compact('kecamatan', 'sekolahs', 'listTahunAjar', 'tahunAjar'));
    }
    
    function tambahSekolah(){
        $kecamatans = Kecamatan::all();
        return view('staff.inputsekolah', compact('kecamatans'));
    }
    
    function createSekolah(Request $request): RedirectResponse {
        $this->validate($request, [
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|integer|unique:sekolah,npsn',
            'status' => 'required|in:Negeri,Swasta',
            'deskripsi' => 'required',
            'id_kecamatan' => 'required|exists:kecamatan,id_kecamatan',
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'kelurahan_desa' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ],[
            'nama_sekolah.required' => 'Nama sekolah wajib diisi',
            'nama_sekolah.max' => 'Nama sekolah tidak boleh lebih dari 255 karakter',
            'npsn.required' => 'NPSN wajib diisi',
            'npsn.size' => 'NPSN harus berisi 8 karakter',
            'npsn.unique' => 'NPSN sudah digunakan',
            'status.required' => 'Status wajib diisi !',
            'status.in' => 'Status harus Negeri atau Swasta',
            'deskripsi.required' => "deskripsi wajib diisi",
            'id_kecamatan.required' => 'Kecamatan wajib diisi',
            'id_kecamatan.exists' => 'Kecamatan tidak valid',
            'alamat.required' => 'Alamat wajib diisi',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter',
            'rt.required' => 'RT wajib diisi',
            'rt.max' => 'RT tidak boleh lebih dari 3 karakter',
            'rw.required' => 'RW wajib diisi',
            'rw.max' => 'RW tidak boleh lebih dari 3 karakter',
            'kelurahan_desa.required' => 'Kelurahan/Desa wajib diisi',
            'kelurahan_desa.max' => 'Kelurahan/Desa tidak boleh lebih dari 255 karakter',
            'kode_pos.required' => 'Kode Pos wajib diisi',
            'kode_pos.max' => 'Kode Pos tidak boleh lebih dari 10 karakter',
        ]);
        
        
        Sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan_desa' => $request->kelurahan_desa,
            'id_kecamatan' => $request->id_kecamatan,
            'kode_pos' => $request->kode_pos
        ]);
        $id = Sekolah::where('npsn', $request->npsn)->first();
        return redirect()->route('staff.profile_sekolah', ['id_sekolah' => $id])->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    function ubahSekolah($id_sekolah){
        $data = Sekolah::where('id_sekolah', $id_sekolah)->first();
        if (!$data) {abort(404); }
        $kecamatans = Kecamatan::all();
        return view('staff.ubah_sekolah', compact('kecamatans','data'));
    }

    function updateSekolah(Request $request, $id_sekolah): RedirectResponse {
        $this->validate($request, [
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|integer',
            'status' => 'required|in:Negeri,Swasta',
            'deskripsi' => 'required',
            'id_kecamatan' => 'required|exists:kecamatan,id_kecamatan',
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'kelurahan_desa' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ],[
            'nama_sekolah.required' => 'Nama sekolah wajib diisi',
            'nama_sekolah.max' => 'Nama sekolah tidak boleh lebih dari 255 karakter',
            'npsn.required' => 'NPSN wajib diisi',
            'npsn.size' => 'NPSN harus berisi 8 karakter',
            'status.required' => 'Status wajib diisi !',
            'status.in' => 'Status harus Negeri atau Swasta',
            'deskripsi.required' => "deskripsi wajib diisi",
            'id_kecamatan.required' => 'Kecamatan wajib diisi',
            'id_kecamatan.exists' => 'Kecamatan tidak valid',
            'alamat.required' => 'Alamat wajib diisi',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter',
            'rt.required' => 'RT wajib diisi',
            'rt.max' => 'RT tidak boleh lebih dari 3 karakter',
            'rw.required' => 'RW wajib diisi',
            'rw.max' => 'RW tidak boleh lebih dari 3 karakter',
            'kelurahan_desa.required' => 'Kelurahan/Desa wajib diisi',
            'kelurahan_desa.max' => 'Kelurahan/Desa tidak boleh lebih dari 255 karakter',
            'kode_pos.required' => 'Kode Pos wajib diisi',
            'kode_pos.max' => 'Kode Pos tidak boleh lebih dari 10 karakter',
        ]);

        $sekolah = Sekolah::findOrFail($id_sekolah);
        if (!$sekolah) {abort(404);}
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->npsn = $request->npsn;
        $sekolah->status = $request->status;
        $sekolah->deskripsi = $request->deskripsi;
        $sekolah->alamat = $request->alamat;
        $sekolah->rt = $request->rt;
        $sekolah->rw = $request->rw;
        $sekolah->kelurahan_desa = $request->kelurahan_desa;
        $sekolah->id_kecamatan = $request->id_kecamatan;
        $sekolah->kode_pos = $request->kode_pos;
        $sekolah->save();
        return redirect()->route('staff.profile_sekolah', ['id_sekolah' => $sekolah->id_sekolah])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    function hapusSekolah($id_sekolah): RedirectResponse {
        $sekolah = Sekolah::find($id_sekolah);
        if (!$sekolah) {abort(404, 'Sekolah tidak ditemukan');}
        $sekolah->delete();
        Rekap::where('id_sekolah', $id_sekolah)->delete();
        Sarpras::where('id_sekolah', $id_sekolah)->delete();
        return redirect()->route('staff.home')->with('success', 'Data Sekolah berhasil dihapus');
    }

    
    function tambahRekap($id_sekolah, $id_tahunajar)
    {
        $rekap = Rekap::where('id_sekolah', $id_sekolah)->where('id_thnAjar', $id_tahunajar)->first();
        if($rekap) {
            return redirect()->route('staff.profile_sekolah', [
                'id_sekolah' => $id_sekolah,
                'id_tahunajar' => $id_tahunajar
            ]);
        }
        $sekolah = Sekolah::find($id_sekolah);//mencari apakah nilai pk sebagai fk yan dipakai memang ada di tabel aslinya
        $tahunAjar = TahunAjar::find($id_tahunajar);
        if (!$sekolah || !$tahunAjar) {abort(404);}
        return view('staff.input_rekap', compact('id_sekolah', 'id_tahunajar'));
    }

    function createRekap(Request $request): RedirectResponse {
        $this->validate($request, [
            'akreditasi' => 'max:255',
            'namaKepsek' => 'required|string|max:255',
            'noHpKepsek' => 'required|string|max:15',
            'jmlGuruHonor' => 'required|integer',
            'jmlGuruPNS' => 'required|integer',
            'jmlRombel' => 'required|integer',
            'jmlMuridPria' => 'required|integer',
            'jmlMuridWanita' => 'required|integer',
            'id_sekolah' => 'required|integer|exists:sekolah,id_sekolah',
            'id_thnAjar' => 'required|integer|exists:tahun_ajar,id_thnAjar',
        ], [
            'akreditasi.max' => 'Akreditasi tidak boleh lebih dari 255 karakter',
            'namaKepsek.required' => 'Nama Kepala Sekolah wajib diisi',
            'namaKepsek.max' => 'Nama Kepala Sekolah tidak boleh lebih dari 255 karakter',
            'noHpKepsek.required' => 'Nomor HP Kepala Sekolah wajib diisi',
            'noHpKepsek.max' => 'Nomor HP Kepala Sekolah tidak boleh lebih dari 15 karakter',
            'jmlGuruHonor.required' => 'Jumlah Guru Honor wajib diisi',
            'jmlGuruHonor.integer' => 'Jumlah Guru Honor harus berupa angka',
            'jmlGuruPNS.required' => 'Jumlah Guru PNS wajib diisi',
            'jmlGuruPNS.integer' => 'Jumlah Guru PNS harus berupa angka',
            'jmlRombel.required' => 'Jumlah Rombongan Belajar wajib diisi',
            'jmlRombel.integer' => 'Jumlah Rombongan Belajar harus berupa angka',
            'jmlMuridPria.required' => 'Jumlah Murid Pria wajib diisi',
            'jmlMuridPria.integer' => 'Jumlah Murid Pria harus berupa angka',
            'jmlMuridWanita.required' => 'Jumlah Murid Wanita wajib diisi',
            'jmlMuridWanita.integer' => 'Jumlah Murid Wanita harus berupa angka',
            'id_sekolah.required' => 'ID Sekolah wajib diisi',
            'id_sekolah.integer' => 'ID Sekolah harus berupa angka',
            'id_sekolah.exists' => 'ID Sekolah tidak valid',
            'id_thnAjar.required' => 'ID Tahun Ajar wajib diisi',
            'id_thnAjar.integer' => 'ID Tahun Ajar harus berupa angka',
            'id_thnAjar.exists' => 'ID Tahun Ajar tidak valid',
        ]);
        
        Rekap::create($request->all());
        
        return redirect()->route('staff.profile_sekolah', [
            'id_sekolah' => $request->id_sekolah,
            'id_tahunajar' => $request->id_thnAjar
        ])->with('success', 'Data Berhasil Disimpan!');
    }

    function ubahRekap($id_rekap) {
        $data = Rekap::where('id_rekap', $id_rekap)->first();
        if (!$data) {abort(404); }
        return view('staff.ubah_rekap', compact('data'));
    }

    function updateRekap(Request $request, $id_rekap) {
        $this->validate($request, [
            'akreditasi' => 'max:255',
            'namaKepsek' => 'required|string|max:255',
            'noHpKepsek' => 'required|string|max:15',
            'jmlGuruHonor' => 'required|integer',
            'jmlGuruPNS' => 'required|integer',
            'jmlRombel' => 'required|integer',
            'jmlMuridPria' => 'required|integer',
            'jmlMuridWanita' => 'required|integer',
        ], [
            'akreditasi.max' => 'Akreditasi tidak boleh lebih dari 255 karakter',
            'namaKepsek.required' => 'Nama Kepala Sekolah wajib diisi',
            'namaKepsek.max' => 'Nama Kepala Sekolah tidak boleh lebih dari 255 karakter',
            'noHpKepsek.required' => 'Nomor HP Kepala Sekolah wajib diisi',
            'noHpKepsek.max' => 'Nomor HP Kepala Sekolah tidak boleh lebih dari 15 karakter',
            'jmlGuruHonor.required' => 'Jumlah Guru Honor wajib diisi',
            'jmlGuruHonor.integer' => 'Jumlah Guru Honor harus berupa angka',
            'jmlGuruPNS.required' => 'Jumlah Guru PNS wajib diisi',
            'jmlGuruPNS.integer' => 'Jumlah Guru PNS harus berupa angka',
            'jmlRombel.required' => 'Jumlah Rombongan Belajar wajib diisi',
            'jmlRombel.integer' => 'Jumlah Rombongan Belajar harus berupa angka',
            'jmlMuridPria.required' => 'Jumlah Murid Pria wajib diisi',
            'jmlMuridPria.integer' => 'Jumlah Murid Pria harus berupa angka',
            'jmlMuridWanita.required' => 'Jumlah Murid Wanita wajib diisi',
            'jmlMuridWanita.integer' => 'Jumlah Murid Wanita harus berupa angka',
        ]);
        
        $rekap = Rekap::find($id_rekap);
        if (!$rekap) {abort(404);}

        $rekap->akreditasi = $request->akreditasi;
        $rekap->namaKepsek = $request->namaKepsek;
        $rekap->noHpKepsek = $request->noHpKepsek;
        $rekap->jmlGuruHonor = $request->jmlGuruHonor;
        $rekap->jmlGuruPNS = $request->jmlGuruPNS;
        $rekap->jmlRombel = $request->jmlRombel;
        $rekap->jmlMuridPria = $request->jmlMuridPria;
        $rekap->jmlMuridWanita = $request->jmlMuridWanita;
        $rekap->save();

        return redirect()->route('staff.profile_sekolah', [
            'id_sekolah' => $rekap->id_sekolah,
            'id_tahunajar' => $rekap->id_thnAjar
        ])->with('success', 'Data Berhasil Diperbarui!');
    }

    function tambahSarpras($id_sekolah, $id_tahunajar) {
        $sarpras = Sarpras::where('id_sekolah', $id_sekolah)->where('id_thnAjar', $id_tahunajar)->first();
        if ($sarpras) {
            return redirect()->route('staff.profile_sekolah', [
                'id_sekolah' => $id_sekolah,
                'id_tahunajar' => $id_tahunajar
            ]);
        }
        $sekolah = Sekolah::find($id_sekolah);
        $tahunAjar = TahunAjar::find($id_tahunajar);
        $sarpras = Sarpras::where('id_sekolah', $id_sekolah)->where('id_thnAjar', $id_tahunajar)->first();
        if (!$sekolah || !$tahunAjar) {abort(404);}
        return view('staff.input_sarpras', compact('id_sekolah', 'id_tahunajar'));
    }
        
    function createSarpras(Request $request): RedirectResponse {
        $this->validate($request, [
            'jmlh_rk' => 'required|integer',
            'jmlh_perpus' => 'required|integer',
            'jmlh_rguru' => 'required|integer',
            'jmlh_ruks' => 'required|integer',
            'jmlh_toilet' => 'required|integer',
            'jmlh_kantin' => 'required|integer',
            'pagar' => 'required|string|in:Terpenuhi,Belum Terpenuhi',
            'gerbang' => 'required|string|in:Terpenuhi,Belum Terpenuhi',
            'paving' => 'required|string|in:Terpenuhi,Belum Terpenuhi',
            'id_sekolah' => 'required|integer|exists:sekolah,id_sekolah',
            'id_thnAjar' => 'required|integer|exists:tahun_ajar,id_thnAjar',
        ], [
            'jmlh_rk.required' => 'Jumlah Ruang Kelas wajib diisi',
            'jmlh_rk.integer' => 'Jumlah Ruang Kelas harus berupa angka',
            'jmlh_perpus.required' => 'Jumlah Perpustakaan wajib diisi',
            'jmlh_perpus.integer' => 'Jumlah Perpustakaan harus berupa angka',
            'jmlh_rguru.required' => 'Jumlah Ruang Guru wajib diisi',
            'jmlh_rguru.integer' => 'Jumlah Ruang Guru harus berupa angka',
            'jmlh_ruks.required' => 'Jumlah Ruang Kepala Sekolah wajib diisi',
            'jmlh_ruks.integer' => 'Jumlah Ruang Kepala Sekolah harus berupa angka',
            'jmlh_toilet.required' => 'Jumlah Toilet wajib diisi',
            'jmlh_toilet.integer' => 'Jumlah Toilet harus berupa angka',
            'jmlh_kantin.required' => 'Jumlah Kantin wajib diisi',
            'jmlh_kantin.integer' => 'Jumlah Kantin harus berupa angka',
            'pagar.required' => 'Pagar wajib dipilih',
            'pagar.string' => 'Pagar harus berupa string',
            'pagar.in' => 'Pilihan Pagar tidak valid',
            'gerbang.required' => 'Gerbang wajib dipilih',
            'gerbang.string' => 'Gerbang harus berupa string',
            'gerbang.in' => 'Pilihan Gerbang tidak valid',
            'paving.required' => 'Paving wajib dipilih',
            'paving.string' => 'Paving harus berupa string',
            'paving.in' => 'Pilihan Paving tidak valid',
            'id_sekolah.required' => 'ID Sekolah wajib diisi',
            'id_sekolah.integer' => 'ID Sekolah harus berupa angka',
            'id_sekolah.exists' => 'ID Sekolah tidak valid',
            'id_thnAjar.required' => 'ID Tahun Ajar wajib diisi',
            'id_thnAjar.integer' => 'ID Tahun Ajar harus berupa angka',
            'id_thnAjar.exists' => 'ID Tahun Ajar tidak valid',
        ]);
        
        Sarpras::create($request->all());
        
        return redirect()->route('staff.profile_sekolah', [
            'id_sekolah' => $request->id_sekolah,
            'id_tahunajar' => $request->id_thnAjar
        ])->with('success', 'Data Berhasil Disimpan!');
    }
    
    function ubahSarpras($id_sarpras) {
        $data = Sarpras::where('id_sarpras', $id_sarpras)->first();
        if (!$data) {abort(404); }
        return view('staff.ubah_sarpras', compact('data'));
    }

    function updateSarpras(Request $request, $id_sarpras) {
        $this->validate($request, [
            'jmlh_rk' => 'required|integer',
            'jmlh_perpus' => 'required|integer',
            'jmlh_rguru' => 'required|integer',
            'jmlh_ruks' => 'required|integer',
            'jmlh_toilet' => 'required|integer',
            'jmlh_kantin' => 'required|integer',
            'pagar' => 'required|string|in:Terpenuhi,Belum Terpenuhi',
            'gerbang' => 'required|string|in:Terpenuhi,Belum Terpenuhi',
            'paving' => 'required|string|in:Terpenuhi,Belum Terpenuhi',
        ], [
            'jmlh_rk.required' => 'Jumlah Ruang Kelas wajib diisi',
            'jmlh_rk.integer' => 'Jumlah Ruang Kelas harus berupa angka',
            'jmlh_perpus.required' => 'Jumlah Perpustakaan wajib diisi',
            'jmlh_perpus.integer' => 'Jumlah Perpustakaan harus berupa angka',
            'jmlh_rguru.required' => 'Jumlah Ruang Guru wajib diisi',
            'jmlh_rguru.integer' => 'Jumlah Ruang Guru harus berupa angka',
            'jmlh_ruks.required' => 'Jumlah Ruang Kepala Sekolah wajib diisi',
            'jmlh_ruks.integer' => 'Jumlah Ruang Kepala Sekolah harus berupa angka',
            'jmlh_toilet.required' => 'Jumlah Toilet wajib diisi',
            'jmlh_toilet.integer' => 'Jumlah Toilet harus berupa angka',
            'jmlh_kantin.required' => 'Jumlah Kantin wajib diisi',
            'jmlh_kantin.integer' => 'Jumlah Kantin harus berupa angka',
            'pagar.required' => 'Pagar wajib dipilih',
            'pagar.string' => 'Pagar harus berupa string',
            'pagar.in' => 'Pilihan Pagar tidak valid',
            'gerbang.required' => 'Gerbang wajib dipilih',
            'gerbang.string' => 'Gerbang harus berupa string',
            'gerbang.in' => 'Pilihan Gerbang tidak valid',
            'paving.required' => 'Paving wajib dipilih',
            'paving.string' => 'Paving harus berupa string',
            'paving.in' => 'Pilihan Paving tidak valid',
        ]);
        
        $sarpras = Sarpras::find($id_sarpras);
        if (!$sarpras) {abort(404);}

        $sarpras->jmlh_rk = $request->jmlh_rk;
        $sarpras->jmlh_perpus = $request->jmlh_perpus;
        $sarpras->jmlh_rguru = $request->jmlh_rguru;
        $sarpras->jmlh_ruks = $request->jmlh_ruks;
        $sarpras->jmlh_toilet = $request->jmlh_toilet;
        $sarpras->jmlh_kantin = $request->jmlh_kantin;
        $sarpras->pagar = $request->pagar;
        $sarpras->gerbang = $request->gerbang;
        $sarpras->paving = $request->paving;
        $sarpras->save();

        return redirect()->route('staff.profile_sekolah', [
            'id_sekolah' => $sarpras->id_sekolah,
            'id_tahunajar' => $sarpras->id_thnAjar
        ])->with('success', 'Data Berhasil Diperbarui!');
    }
    
    function profileSekolah($id_sekolah, $id_thnAjar = null) {
        $sekolah = Sekolah::where('id_sekolah', $id_sekolah)->first();
        if ($id_thnAjar) {
            $tahunAjar = TahunAjar::where('id_thnAjar', $id_thnAjar)->first();
        } else {
            $tahunAjar = TahunAjar::orderBy('id_thnAjar', 'desc')->first();
        }
        if (!$sekolah || !$tahunAjar) {abort(404,);}
        $listTahunAjar = TahunAjar::all();
        $rekap = Rekap::firstOrNew(['id_thnAjar' => $tahunAjar->id_thnAjar,'id_sekolah' => $sekolah->id_sekolah,]);
        $sarpras = Sarpras::firstOrNew(['id_thnAjar' => $tahunAjar->id_thnAjar,'id_sekolah' => $sekolah->id_sekolah,]);
        $kec = Kecamatan::firstOrNew(['id_kecamatan' => $sekolah->id_kecamatan]);
        $kebutuhan_rk = max($rekap->jmlRombel - $sarpras->jmlh_rk, 0);
        return view('staff.profile_sekolah', compact('sekolah', 'tahunAjar', 'listTahunAjar','rekap','sarpras','kec', 'kebutuhan_rk'));
    }
}