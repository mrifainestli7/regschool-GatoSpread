@extends('layouts.main')

@section('container')
<div class="container-fluid">
    <div class="mb-3">
        <h4 class="mt-2 mb-4">Ubah Data Sekolah</h4>
        <div class="row mb-2">
                <div class="col-md-12">
                    <div class="form-group ">
                        <a href="{{ route('staff.profile_sekolah', ['id_sekolah' => $data->id_sekolah]) }}" class="btn btn-primary move-right" style="background-color: #4c45b4; color: white;">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a> 
                    </div> 
                </div>
            </div>
        <div class="col-md-17">
            <div class="card">
                <div class="card-header" style="background-color: #4c45b4; color: white;">
                    Ubah data Sekolah
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="formUpdateSchool">
                        @csrf
                        <div class="row">
                            <!-- Nama Sekolah dan NPSN dalam satu baris -->
                            <div class="form-group col-md-6">
                                <label>Nama Sekolah</label>
                                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror"
                                    id="nama_sekolah" name="nama_sekolah"
                                    value="{{ old('nama_sekolah', $data->nama_sekolah) }}"
                                    placeholder="Masukkan Nama Sekolah">
                                @error('nama_sekolah')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="npsn">NPSN</label>
                                <input type="number" class="form-control @error('npsn') is-invalid @enderror" id="npsn"
                                    name="npsn" value="{{ old('npsn', $data->npsn) }}" placeholder="Masukkan NPSN">
                                @error('npsn')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group mt-3 col-md-6">
                                <label for="status">Status</label>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <label class="custom-control custom-radio custom-control-inline mr-3">
                                            <input type="radio" name="status" value="Negeri"
                                                {{ old('status', $data->status) == 'Negeri' ? 'checked' : '' }}
                                                class="custom-control-input">
                                            <span class="custom-control-label">Negeri</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline ml-3">
                                            <input type="radio" name="status" value="Swasta"
                                                {{ old('status', $data->status) == 'Swasta' ? 'checked' : '' }}
                                                class="custom-control-input">
                                            <span class="custom-control-label">Swasta</span>
                                        </label>
                                    </div>
                                    @error('status')
                                    <div class="text-danger ps-5">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group mt-3 col-md-12">
                                <label>Deskripsi Sekolah</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                                    id="deskripsi" name="deskripsi"
                                    placeholder="Masukkan Deskripsi Sekolah">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="form-group mt-3 col-md-12">
                                <label>Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" value="{{ old('alamat', $data->alamat) }}"
                                    placeholder="Masukkan Alamat Sekolah">
                                @error('alamat')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>

                            <!-- RT dan RW dalam satu baris -->
                            <div class="form-group mt-3 col-md-6">
                                <label for="rt">RT</label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt"
                                    name="rt" value="{{ old('rt', $data->rt) }}" placeholder="Masukkan RT">
                                @error('rt')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3 col-md-6">
                                <label for="rw">RW</label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw"
                                    name="rw" value="{{ old('rw', $data->rw) }}" placeholder="Masukkan RW">
                                @error('rw')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kelurahan/Desa dan Kecamatan dalam satu baris -->
                            <div class="form-group mt-3 col-md-6">
                                <label for="kelurahan_desa">Kelurahan/Desa</label>
                                <input type="text" class="form-control @error('kelurahan_desa') is-invalid @enderror"
                                    id="kelurahan_desa" name="kelurahan_desa"
                                    value="{{ old('kelurahan_desa', $data->kelurahan_desa) }}"
                                    placeholder="Masukkan Kelurahan/Desa">
                                @error('kelurahan_desa')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3 col-md-6">
                                <label for="id_kecamatan">Kecamatan</label>
                                <select class="form-control @error('id_kecamatan') is-invalid @enderror"
                                    id="id_kecamatan" name="id_kecamatan">
                                    <option value="" disabled selected>Pilih Kecamatan</option>
                                    @foreach($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id_kecamatan }}"
                                        {{ old('id_kecamatan', $data->id_kecamatan) == $kecamatan->id_kecamatan ? 'selected' : '' }}>
                                        {{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                @error('id_kecamatan')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kode Pos -->
                            <div class="form-group mt-3 col-md-12">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" class="form-control @error('kode_pos') is-invalid @enderror"
                                    id="kode_pos" name="kode_pos" value="{{ old('kode_pos', $data->kode_pos) }}"
                                    placeholder="Masukkan Kode Pos">
                                @error('kode_pos')
                                <div class="invalid-feedback">* {{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol Submit -->
                            <div class="form-group mt-3 col-md-12">
                                <button type="submit" class="btn btn-primary mt-4 move-right"
                                    style="background-color: #4c45b4; color: white;">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection