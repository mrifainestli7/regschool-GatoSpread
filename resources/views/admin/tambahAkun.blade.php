@extends('layouts.admin')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Tambah akun</h4>
            {{-- start here --}}

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-17">
                        <div class="card">
                            <div class="card-header" style="background-color: #4c45b4; color: white;">
                                Input data akun
                            </div>
                            <div class="card-body" >
                                
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- NIP -->
                                    <div class="form-group mt-3">
                                        <label for="nip">NIP</label>
                                        <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP" >
                                    </div>
                                    @error('nip')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nama -->
                                    <div class="form-group mt-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama" >
                                    </div>
                                    @error('nama')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nomor Telepon -->
                                    <div class="form-group mt-3">
                                        <label for="nomor_telepon">Nomor Telepon</label>
                                        <input type="tel" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Masukkan Nomor Telepon" >
                                    </div>
                                    @error('nomor_telepon')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- E-mail -->
                                    <div class="form-group mt-3">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan E-mail" >
                                    </div>
                                    @error('email')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Password -->
                                    <div class="form-group mt-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password" >
                                    </div>
                                    @error('password')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <div class="form-group mt-3">
                                    <label for="picture">Foto Profil</label>
                                     <input type="file" class="form-control rounded @error('picture') is-invalid @enderror" id="picture" name="picture">
                                    </div>
                                    @error('picture')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Tombol Submit -->
                                    <button type="submit" class="btn btn-primary mt-4 move-right " style="background-color: #4c45b4; color: white;
                                    ">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             {{-- end here --}}
        </div>
    </div>
@endsection