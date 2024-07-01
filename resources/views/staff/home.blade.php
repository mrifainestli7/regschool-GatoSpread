@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Profile</h4>

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
                                    <a class="btn btn-secondary dropdown-toggle rounded-4" style="background-color: #4c45b4" data-bs-toggle="dropdown" 
                                        id="dropdownMenuButton" href="#" role="button" aria-expanded="false">AKSI</a>
                                    <ul class="dropdown-menu rounded-4" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Tambah Data Rekap</a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Rekap</a></li>
                                        <li><a class="dropdown-item" href="#">Tambah Data Sarpras </a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Sarpras</a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Sekolah</a></li>
                                        <li><a class="dropdown-item" href="#">Hapus Data Sekolah </a></li>
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

                            <h5 class="mb-1">SDN 1061666 PATAUMBAK</h5>
                            <p class="mb-0">Kebutuhan Ruang Kelas : 1</p>
                            </div>
                        </div>
                    </div>
                    </div>
              
                            <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-md-2 col-9">
                                <div class="dropdown ml-auto">
                                    <li class="nav-item dropdown">
                                    <a class="btn btn-secondary dropdown-toggle rounded-4" style="background-color: #4c45b4" data-bs-toggle="dropdown" 
                                        id="dropdownMenuButton" href="#" role="button" aria-expanded="false">AKSI</a>
                                    <ul class="dropdown-menu rounded-4" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Tambah Data Rekap</a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Rekap</a></li>
                                        <li><a class="dropdown-item" href="#">Tambah Data Sarpras </a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Sarpras</a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Sekolah</a></li>
                                        <li><a class="dropdown-item" href="#">Hapus Data Sekolah </a></li>
                                    </ul>
                                    </li>
                                </div>
                                </div>
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
    
<div class="row">
    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card"style=" height: 250px;" >
            <div class="card-body p-3">
                <div class="container mt-1">
                    <div class="container result-containe ">
                        <h4 class="result-title">Deskripsi Sekolah</h4>
                        <p class="mb-1">NPSN : 3423748798670787</p>
                        <p class="mb-1">Tingkat Pendidikan : SD</p>
                        <p class="mb-1">Status : Negri</p>
                        <p class="mb-1">Alamat : Jl. Tentara Pelajar No.12, RW.001, Bumijo, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55231</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card" style=" height: 250px;" >
            <div class="card-body p-3">
                <div class="container mt-1">
                    <div class="container result-containe ">
                        <h4 class="result-title">Alamat Sekolah</h4>
                        <p class="small text-muted mb-1"><strong>Alamat : Jl. Tentara Pelajar No.12, RW.001, Bumijo, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55231</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
<div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card" >
        <div class="card-body p-3">
          <div class="container mt-1">
            <div class="container result-containe">
                <div class="row align-items-center  mt-3">
                    <div class="col">
                        <h4 class="result-title">Data Tahun Ajar </h4>
                    </div>
                </div>   
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Akreditasi:</strong> A</p>
                            <p><strong>Nama Kepala Sekolah:</strong> Budi Santoso</p>
                            <p><strong>No HP:</strong> 081234567890</p>
                            <p><strong>Jumlah Rombongan Belajar:</strong> 20</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Jumlah Murid:</strong> 500</p>
                            <p><strong>Laki-laki:</strong> 250</p>
                            <p><strong>Perempuan:</strong> 240</p>
                            <p><strong>Non Gender:</strong> 10</p>
                        </div>
                        <div class="col md-4">
                            <p><strong>Jumlah Guru:</strong> 50</p>
                            <p><strong>Laki-laki:</strong> 20</p>
                            <p><strong>Perempuan:</strong> 25</p>
                            <p><strong>Non Gender:</strong> 5</p>
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
                <p class="small text-muted mb-1"><strong>SMA SWASTA PEMBANGUNAN GALANG adalah salah satu satuan pendidikan dengan jenjang SMA di Galang Kota, Kec. Galang, Kab. Deli Serdang, Sumatera Utara. Dalam menjalankan kegiatannya, SMA SWASTA PEMBANGUNAN GALANG berada di bawah naungan Kementerian Pendidikan dan Kebudayaan.</strong></p>
                <p class="small text-muted mb-1"><strong>SMA SWASTA PEMBANGUNAN GALANG adalah salah satu satuan pendidikan dengan jenjang SMA di Galang Kota, Kec. Galang, Kab. Deli Serdang, Sumatera Utara. Dalam menjalankan kegiatannya, SMA SWASTA PEMBANGUNAN GALANG berada di bawah naungan Kementerian Pendidikan dan Kebudayaan.</strong></p>
            </div>
        </div>
    </div>
</div>

</div>

  </div>
  <div class="tab-pane container fade  p-0 " id="menu1">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Detail Sarana</h5>
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
                            <td>Ruang Kelas</td>
                            <td>9</td>       
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Ruang Perpustakaan</td>
                            <td>3</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Detail Pra-Sarana</h5>
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
                            <td>Paving blok</td>
                            <td>9</td>       
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Pagar</td>
                            <td>3</td> 
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