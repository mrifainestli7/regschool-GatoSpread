@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Tambah Data Sekolah</h4>           
            <div class="col-md-17">
                        <div class="card">
                            <div class="card-header" style="background-color: #4c45b4; color: white;">
                                Input data Akun
                        </div>
                        <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data" id="formAddAccount">
                                        @csrf
                                    <div class="row">
                                    <!-- Nama Sekolah -->
                                    <div class="form-group mt-3 ">
                                        <label>Nama Sekolah</label>
                                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekoalah"  placeholder="Masukkan Nama" >
                                    </div>

                                      <!-- NPSN -->
                                    <div class="form-group mt-3">
                                        <label for="nama">NPSN</label>
                                        <input type="text" class="form-control" id="NPSN" name="NPSN"  placeholder="Masukkan NPSN" >
                                    </div>

                                    <!-- Kecamatan -->
                                    <div class="form-group mt-3">
                                        <label for="nama">Kecamatan</label>
                                        <input type="text" class="form-control" id="Kecamatan" name="Kecamatan"  placeholder="Masukkan Kecamatan" >
                                    </div>
                                    
                                    <div class="form-group mt-3">
                                    <label for="nama">Status</label>
                                    <div class="card-body  ">
                                    
                                        <form>
                    
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="radio-inline" checked="" class="custom-control-input">
                                                <span class="custom-control-label" > Negri   </span>
                                            </label>
                                            &nbsp &nbsp &nbsp &nbsp
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="radio-inline" class="custom-control-input">
                                                <span class="custom-control-label"> Swasta </span>
                                            </label>
                                        </form>
                                    </div>
                                    </div>

                                    <div class="form-group mt-3">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                        <label> Deskripsi Sekolah</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group mt-3">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                        <label> Alamat</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group mt-3">
                                    <label for="picture">Foto sitePlan</label>
                                     <input type="file" class="form-control rounded" id="sitePlan" name="sitePlan">
                                    </div>
                                  
                                    <div class="form-group mt-3">
                                    <label for="picture">Foto Profil Sekolah</label>
                                     <input type="file" class="form-control rounded" id="profil_sekolah" name="profil_sekolah">
                                    </div>
                                    
                                    <!-- Tombol Submit -->
                                    
                                </form>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 move-right " style="background-color: #4c45b4; color: white;">Simpan</button>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection