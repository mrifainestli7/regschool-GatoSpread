@extends('layouts.admin')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-3">Detail akun</h4>
            {{-- start here --}}
            <div class="row">
                <div class="col-md-5">
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home')}}" class="breadcrumb-link">Kelola akun</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail akun </li>
                        </ol>              
                    </nav>      
                    </div> 
                </div>
            </div>
            <div class="container mt-1">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <!-- Gambar Profil -->
                        <div class="text-center mb-4">
                            <img src="{{ asset($user->pfp) }}" class="img-fluid profile-border" alt="Foto Profil">
                        </div>
                        <!-- Terakhir Kali Diupdate -->
                        <div class="card mb-2">
                            <div class="card-body text-center p-2">
                                <p class="mb-1 small">Terakhir kali diupdate:</p>
                                <p class="mb-0 small font-weight-bold">{{ $user->updated_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        <!-- Dibuat Pada -->
                        <div class="card">
                            <div class="card-body text-center p-2">
                                <p class="mb-1 small">Dibuat pada:</p>
                                <p class="mb-0 small font-weight-bold">{{ $user->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Formulir -->
                        <div class="card">
                            <div class="card-header" style="background-color: #4c45b4; color: white;">
                                Ubah data akun
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- NIP -->
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nip', $user->nip) }}" placeholder="Masukkan NIP">
                                    </div>
                                    @error('nip')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nama -->
                                    <div class="form-group mt-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $user->name) }}" placeholder="Masukkan Nama">
                                    </div>
                                    @error('nama')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nomor Telepon -->
                                    <div class="form-group mt-3">
                                        <label for="nomor_telepon">Nomor Telepon</label>
                                        <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $user->phone) }}" placeholder="Masukkan Nomor Telepon">
                                    </div>
                                    @error('nomor_telepon')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                    <!-- E-mail -->
                                    <div class="form-group mt-3">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan E-mail">
                                    </div>
                                    @error('email')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                    <!-- Password -->
                                    <div class="form-group mt-3">
                                        <label for="password">Reset password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                    </div>
                                    @error('password')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                    <!-- Ganti Foto Profil -->
                                    <div class="form-group mt-3">
                                        <label for="picture">Ganti foto profil</label>
                                        <input type="file" class="form-control" id="picture" name="picture">
                                    </div>
                                    @error('picture')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                    <!-- Tombol Submit -->
                                    <button type="submit" class="btn btn-primary mt-4">Ubah data</button>
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger mt-4" data-toggle="modal" data-target="#confirmDeleteModal">
                                        <i class="bi bi-hand-index"></i>
                                        <p2 class="px-2 py-1">Hapus Akun</p2>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             {{-- end here --}}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat diurungkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="{{ route('admin.hapusAkun', ['id' => $user->id])}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection