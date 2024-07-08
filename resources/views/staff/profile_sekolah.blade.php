@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Profile Sekolah</h4>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body" style="background-color: #4c45b4; border-radius: 8px 8px 0 0; padding: 20px;height: 80px">
                    <div class="row justify-content-between">
                        <div class="col-md-1 col-2">
                            
                            <img src="{{asset('/image/sekolah.png')}}" alt="User Avatar" class="rounded position-absolute" style="width: 120px;">
                        </div>
                        <div class="container">
                            <div class="row justify-content-end">
                            <div class="col-md-2 col-9">
                                <div class="dropdown ml-auto">
                                    <li class="nav-item dropdown">
                                    <a class="btn btn-secondary dropdown-toggle rounded-4" style="background-color: #857ac6" data-bs-toggle="dropdown" 
                                        id="dropdownMenuButton" href="#" role="button" aria-expanded="false">{{ $tahunAjar->tahunAjar1 }} / {{ $tahunAjar->tahunAjar2 }}</a>
                                        <ul class="dropdown-menu rounded-4" aria-labelledby="dropdownMenuButton">
                                          @foreach($listTahunAjar as $tahun)
                                              <li>
                                                  <a class="dropdown-item" href="{{ route('staff.profile_sekolah', ['id_sekolah' => $sekolah->id_sekolah, 'id_tahunajar' => $tahun->id_thnAjar]) }}">
                                                      {{ $tahun->tahunAjar1 }} / {{ $tahun->tahunAjar2 }}
                                                  </a>
                                              </li>
                                          @endforeach
                                      </ul>
                                    </li>
                                </div>
                                </div>
                                <div class="col-md-2 col-9">
                                <div class="dropdown ml-auto">
                                    <li class="nav-item dropdown">
                                    <a class="btn btn-secondary dropdown-toggle rounded-4" style="background-color: #857ac6" data-bs-toggle="dropdown" 
                                        id="dropdownMenuButton" href="#" role="button" aria-expanded="false">AKSI</a>
                                    <ul class="dropdown-menu rounded-4" aria-labelledby="dropdownMenuButton">
                                        @if(isset($rekap) && $rekap->id_rekap)
                                            <li><a class="dropdown-item" href="{{ route('staff.ubah_rekap', ['id_rekap' => $rekap->id_rekap ]) }}">Ubah Data Rekap</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="{{ route('staff.tambah_rekap', ['id_sekolah' => $sekolah->id_sekolah, 'id_tahunajar' => $tahunAjar->id_thnAjar]) }}">Tambah Data Rekap</a></li>
                                        @endif
                                        @if(isset($rekap) && $sarpras->id_sarpras)
                                            <li><a class="dropdown-item" href="{{ route('staff.ubah_sarpras', ['id_sarpras' => $sarpras->id_sarpras]) }}">Ubah Data Sarpras</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="{{ route('staff.tambah_sarpras', ['id_sekolah' => $sekolah->id_sekolah, 'id_tahunajar' => $tahunAjar->id_thnAjar]) }}">Tambah Data Sarpras </a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('staff.ubah_sekolah', ['id_sekolah' => $sekolah->id_sekolah]) }}">Ubah Data Sekolah</a></li>
                                        <li><a class="dropdown-item" href="{{ route('staff.hapus_sekolah', ['id_sekolah' => $sekolah->id_sekolah ?? 0]) }}" style="background-color: #e15555;">Hapus Data Sekolah </a></li>
                                    </ul>
                                    </li>
                                </div>
                                </div>

                            </div>
                        </div>

                        
                    </div>
                </div>
                <div class="card-footer" style="background-color: white; border-radius: 0 0 8px 8px;height: 120px">
                    <div class="row justify-content-end">
                    <div class="border-top user-social-box">
                    <div class="card-body p-3 position-absolute bottom-0 start-0">
                        <div class="container mt-1">
                            <div class="container result-containe ">

                            <h5 class="mb-1">{{ $sekolah->nama_sekolah }}</h5>
                            <p class="mb-0">Kebutuhan Ruang Kelas : {{ $kebutuhan_rk }}</p>
                            </div>
                        </div>
                    </div>
                    </div>
              
                            <div class="container">
                            <div class="row justify-content-end">
                               
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
     </div>
   
<!-- Nav pills -->
<style>
    .nav-tabs .nav-link.active {
      background:#f68365;
      color: white;
    }
    .nav-tabs .nav-link {
      background:#9994BB;
      color: white;
    }
  </style>

  <ul class="nav nav-tabs nav-justified col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#home">Rekap Data</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#menu1">Rekap Perasarana</a>
    </li>
  </ul>



<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active p-0" id="home">
    
    
<div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card"style=" height: 150px;" >
                <div class="card-body p-3">
                    <div class="container mt-1">
                        <div class="container result-containe ">
                            <h4 class="result-title">Identitas Sekolah</h4>
                            <p class="mb-1">NPSN : {{ $sekolah->npsn }}</p>
                            <p class="mb-1">Tingkat Pendidikan : SD</p>
                            <p class="mb-1">Status : {{ $sekolah->status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card" style=" height: 150px;" >
                <div class="card-body p-3">
                    <div class="container mt-1">
                        <div class="container result-containe ">
                            <h4 class="result-title">Alamat Sekolah</h4>
                            <p class="small text-muted mb-1"><strong>Alamat : {{ $sekolah->alamat }}, RW.{{ $sekolah->rw }} RT.{{ $sekolah->rt }}, {{ $sekolah->kelurahan_desa }}, Kec. {{ $kec->nama_kecamatan }}, Deli Serdang, Sumatera Utara {{ $sekolah->kode_pos }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" >
        <div class="card-body p-3">
          <div class="container mt-1">
            <div class="container result-containe">
                <div class="row align-items-center my-3">
                    <div class="col">
                        <h4 class="result-title">Data Tahun Ajar : {{ $tahunAjar->tahunAjar1 }} / {{ $tahunAjar->tahunAjar2 }}</h4>
                    </div>
                </div>   
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Akreditasi:</strong> {{ $rekap->akreditasi }}</p>
                            <p><strong>Nama Kepala Sekolah:</strong> {{ $rekap->namaKepsek }}</p>
                            <p><strong>No HP:</strong> {{ $rekap->noHpKepsek }}</p>
                            <p><strong>Jumlah Rombongan Belajar:</strong> {{ $rekap->jmlRombel }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Jumlah Murid:</strong></p>
                            <p><strong>Laki-laki:</strong> {{ $rekap->jmlMuridPria }}</p>
                            <p><strong>Perempuan:</strong> {{ $rekap->jmlMuridWanita }}</p>
                            <p><strong>Total:</strong> {{ $rekap->jmlMuridPria + $rekap->jmlMuridWanita }}</p>
                        </div>
                        <div class="col md-4">
                            <p><strong>Jumlah Guru:</strong> </p>
                            <p><strong>Guru Honor:</strong> {{ $rekap->jmlGuruHonor }}</p>
                            <p><strong>Guru PNS:</strong> {{ $rekap->jmlGuruPNS }}</p>
                            <p><strong>Total:</strong> {{ $rekap->jmlGuruHonor + $rekap->jmlGuruPNS }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card" >
        <div class="card-body p-3">
            <div class="container result-containe ">
                <h4 class="result-title">Deskripsi Sekolah</h4>
                <p class="small text-muted mb-1"><strong>{{ $sekolah->deskripsi }}</strong></p>
            </div>
        </div>
    </div>
</div>

</div>

  </div>
  <div class="tab-pane container fade  p-0 " id="menu1">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Detail Sarana : {{ $tahunAjar->tahunAjar1 }} / {{ $tahunAjar->tahunAjar2 }}</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Jenis Sarana</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Ruang kelas</td>
                            <td>{{ $sarpras->jmlh_rk }}</td>       
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Ruang guru</td>
                            <td>{{ $sarpras->jmlh_rguru }}</td> 
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Ruang perpustakaan</td>
                          <td>{{ $sarpras->jmlh_perpus }}</td> 
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Ruang UKS</td>
                          <td>{{ $sarpras->jmlh_ruks }}</td> 
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Kantin</td>
                          <td>{{ $sarpras->jmlh_kantin }}</td> 
                        </tr>
                        <tr>
                          <th scope="row">6</th>
                          <td>Toilet</td>
                          <td>{{ $sarpras->jmlh_toilet }}</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Detail Pra-Sarana : {{ $tahunAjar->tahunAjar1 }} / {{ $tahunAjar->tahunAjar2 }}</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Jenis Sarana</th>
                            <th scope="col">Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Paving blok</td>
                            <td>{{ $sarpras->paving }}</td>       
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Pagar</td>
                            <td>{{ $sarpras->pagar }}</td> 
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Gerbang</td>
                          <td>{{ $sarpras->gerbang }}</td> 
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  </div>


  


        </div>
    </div>
@endsection