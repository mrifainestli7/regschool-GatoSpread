@extends('layouts.admin')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Detail akun</h4>
            {{-- start here --}}
            
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <!-- Gambar Profil -->
                        <div class="text-center mb-4">
                            <img src="{{ asset($user->pfp) }}" class="img-fluid" alt="Foto Profil">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Formulir -->
                        <div class="card">
                            <div class="card-header">
                                Ubah data akun
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- NIP -->
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nip', $user->nip) }}" placeholder="Masukkan NIP" >
                                    </div>
                                    @error('nip')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nama -->
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $user->name) }}" placeholder="Masukkan Nama" >
                                    </div>
                                    @error('nama')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nomor Telepon -->
                                    <div class="form-group">
                                        <label for="nomor_telepon">Nomor Telepon</label>
                                        <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $user->phone) }}" placeholder="Masukkan Nomor Telepon" >
                                    </div>
                                    @error('nomor_telepon')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- E-mail -->
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan E-mail" >
                                    </div>
                                    @error('email')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password">Reset password</label>
                                        <input type="password" class="form-control" id="password" name="password" sword) }}" placeholder="Masukkan Password" >
                                    </div>
                                    @error('password')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="picture">Ganti foto profil</label>
                                        <input type="file" class="form-control" id="picture" name="picture">
                                    </div>
                                    @error('picture')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Tombol Submit -->
                                    <button type="submit" class="btn btn-primary mt-4">Ubah data</button>
                                    <a href="{{ route('admin.hapusAkun', $user->id)}}" class="btn btn-primary mt-4" style="background-color: #d22f2f;">
                                        <i class="bi bi-hand-index "></i>
                                        <p2 class="px-2 py-1">Hapus Akun</p2>
                                    </a>
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
