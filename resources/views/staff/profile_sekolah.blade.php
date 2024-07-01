@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Profile</h4>
          {{-- @dd($sekolah, $listTahunAjar, $tahunAjar, $rekap, $sarpras) --}}
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card" >
        <div class="card-body p-4">
          <div class="d-flex">
            <div class="flex-shrink-0">
            {{-- <img src="{{ asset(Auth::user()->pfp) }}" alt="Card image cap" class="img-fluid" style="width: 200px ; border-radius: 10px;"> --}}
            </div>
            <div class="flex-grow-1 ms-3">
            <h4 class="mt-2 mb-4">Tambah Data Sekolah</h4>
              <div>
                  <p class="mb-1">NPSN : {{ $sarpras->pagar }}</p>
                  <p class="mb-1">Tingkat Pendidikan :</p>
                  <p class="mb-1">Status :</p>
                  <p class="mb-1">Almat :</p>
                </div>
       
            </div>
            
          </div>
          <div class="form-group mt-1 ">
          <h4 class="mt-4 mb-0">Tambah Data Sekolah</h4>
          

            <div class="d-flex justify-content-start rounded-5 p-0 mb-0 ">
                <div class="d-flex justify-content-start rounded-5 p-3 mb-3 ">
                    <div>
                  <p class="small text-muted mb-1">Akreditasi :</p>
                  <p class="small text-muted mb-1">Nama Kepala Sekolah :</p>
                  <p class="small text-muted mb-1">No Hp :</p>
                  <p class="small text-muted mb-1">Jumlah Rombongan Belajar :</p>
                </div>
                </div>

                <div class="d-flex justify-content-start rounded-5 p-3 mb-4 ">
                    <div>
                  <p class="small text-muted mb-1">Jumlah Murid :</p>
                  <p class="small text-muted mb-1">Laki-laki : :</p>
                  <p class="small text-muted mb-1">Perempuan :</p>
                  <p class="small text-muted mb-1">Non Gender :</p>
                </div>
                </div>

                <div class="d-flex justify-content-start rounded-5 p-3 mb-3 ">
                    <div>
                <p class="small text-muted mb-1">Jumlah Guru :</p>
                  <p class="small text-muted mb-1">Laki-laki : :</p>
                  <p class="small text-muted mb-1">Perempuan :</p>
                  <p class="small text-muted mb-1">Non Gender :</p>
                </div>
                </div>
              </div> 
            </div>

            <div class="form-group mt-1 ">
            <h4 class="mt-1 mb-2">Tambah Data Sekolah</h4>
            <p class="small text-muted mb-1">SMA SWASTA PEMBANGUNAN GALANG adalah salah satu satuan pendidikan dengan jenjang SMA di Galang Kota, Kec. Galang, Kab. Deli Serdang, Sumatera Utara. Dalam menjalankan kegiatannya, SMA SWASTA PEMBANGUNAN GALANG berada di bawah naungan Kementerian Pendidikan dan Kebudayaan.</p>

            </div>
        </div>
      </div>
    </div>
  </div>
    </div>
@endsection