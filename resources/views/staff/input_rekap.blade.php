@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-2">Tambah Rekap</h4> 
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="form-group ">
                        <a href="{{ route('staff.profile_sekolah', ['id_sekolah' => $id_sekolah]) }}" class="btn btn-primary move-right" style="background-color: #4c45b4; color: white;">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>                        
                    </div> 
                </div>
            </div>
            <div class="col-md-17">
                <div class="card">
                    <div class="card-header" style="background-color: #4c45b4; color: white;">
                        Input Data Rekap
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_sekolah" value="{{ $id_sekolah }}">
                            <input type="hidden" name="id_thnAjar" value="{{ $id_tahunajar }}">

                            <div class="row">
                                <!-- Akreditasi -->
                                <div class="form-group col-md-12">
                                    <label for="akreditasi">Akreditasi</label>
                                    <input type="text" class="form-control @error('akreditasi') is-invalid @enderror" id="akreditasi" name="akreditasi" value="{{ old('akreditasi') }}" placeholder="Masukkan Akreditasi">
                                    @error('akreditasi')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Nama Kepsek -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="namaKepsek">Nama Kepala Sekolah</label>
                                    <input type="text" class="form-control @error('namaKepsek') is-invalid @enderror" id="namaKepsek" name="namaKepsek" value="{{ old('namaKepsek') }}" placeholder="Masukkan Nama Kepala Sekolah">
                                    @error('namaKepsek')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- No Hp Kepsek -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="noHpKepsek">Nomor Telephone Kepala Sekolah</label>
                                    <input type="text" class="form-control @error('noHpKepsek') is-invalid @enderror" id="noHpKepsek" name="noHpKepsek" value="{{ old('noHpKepsek') }}" placeholder="Masukkan No Hp Kepala Sekolah">
                                    @error('noHpKepsek')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Guru Honor dan Jumlah Guru PNS dalam satu baris -->
                                <div class="form-group mt-3 col-md-6">
                                    <label for="jmlGuruHonor">Jumlah Guru Honor</label>
                                    <input type="number" class="form-control @error('jmlGuruHonor') is-invalid @enderror" id="jmlGuruHonor" name="jmlGuruHonor" value="{{ old('jmlGuruHonor') }}" placeholder="Masukkan Jumlah Guru Honor">
                                    @error('jmlGuruHonor')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 col-md-6">
                                    <label for="jmlGuruPNS">Jumlah Guru PNS</label>
                                    <input type="number" class="form-control @error('jmlGuruPNS') is-invalid @enderror" id="jmlGuruPNS" name="jmlGuruPNS" value="{{ old('jmlGuruPNS') }}" placeholder="Masukkan Jumlah Guru PNS">
                                    @error('jmlGuruPNS')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Rombel -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="jmlRombel">Jumlah Rombongan Belajar</label>
                                    <input type="number" class="form-control @error('jmlRombel') is-invalid @enderror" id="jmlRombel" name="jmlRombel" value="{{ old('jmlRombel') }}" placeholder="Masukkan Jumlah Rombel">
                                    @error('jmlRombel')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Murid Pria dan Jumlah Murid Wanita dalam satu baris -->
                                <div class="form-group mt-3 col-md-6">
                                    <label for="jmlMuridPria">Jumlah Murid Pria</label>
                                    <input type="number" class="form-control @error('jmlMuridPria') is-invalid @enderror" id="jmlMuridPria" name="jmlMuridPria" value="{{ old('jmlMuridPria') }}" placeholder="Masukkan Jumlah Murid Pria">
                                    @error('jmlMuridPria')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 col-md-6">
                                    <label for="jmlMuridWanita">Jumlah Murid Wanita</label>
                                    <input type="number" class="form-control @error('jmlMuridWanita') is-invalid @enderror" id="jmlMuridWanita" name="jmlMuridWanita" value="{{ old('jmlMuridWanita') }}" placeholder="Masukkan Jumlah Murid Wanita">
                                    @error('jmlMuridWanita')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="form-group mt-3 col-md-12">
                                    <button type="submit" class="btn btn-primary mt-4 move-right" style="background-color: #4c45b4; color: white;">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
