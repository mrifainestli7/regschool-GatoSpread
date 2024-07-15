@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Ubah Data Sarana dan Pra-sarana</h4>
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary move-right" style="background-color: #4c45b4; color: white;"> 
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                    </div> 
                </div>
            </div>
            <div class="col-md-17">
                <div class="card">
                    <div class="card-header" style="background-color: #4c45b4; color: white;">
                        Ubah Data Sarana dan Pra-sarana
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="id_sekolah" value="{{ $data->id_sekolah }}">
                            <input type="hidden" name="id_thnAjar" value="{{ $data->id_thnAjar }}">
                            
                            <!-- Sarana -->
                            <div>
                                <h5 class="mb-3">Sarana</h5>
                                
                                <!-- Jumlah Ruang Kelas -->
                                <div class="form-group col-md-12">
                                    <label for="jmlh_rk">Jumlah Ruang Kelas</label>
                                    <input type="number" class="form-control @error('jmlh_rk') is-invalid @enderror" id="jmlh_rk" name="jmlh_rk" value="{{ old('jmlh_rk', $data->jmlh_rk) }}" placeholder="Masukkan Jumlah Ruang Kelas">
                                    @error('jmlh_rk')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Perpustakaan -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="jmlh_perpus">Jumlah Perpustakaan</label>
                                    <input type="number" class="form-control @error('jmlh_perpus') is-invalid @enderror" id="jmlh_perpus" name="jmlh_perpus" value="{{ old('jmlh_perpus', $data->jmlh_perpus) }}" placeholder="Masukkan Jumlah Perpustakaan">
                                    @error('jmlh_perpus')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Ruang Guru -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="jmlh_rguru">Jumlah Ruang Guru</label>
                                    <input type="number" class="form-control @error('jmlh_rguru') is-invalid @enderror" id="jmlh_rguru" name="jmlh_rguru" value="{{ old('jmlh_rguru', $data->jmlh_rguru) }}" placeholder="Masukkan Jumlah Ruang Guru">
                                    @error('jmlh_rguru')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Ruang Kepala Sekolah -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="jmlh_ruks">Jumlah Ruang Kepala Sekolah</label>
                                    <input type="number" class="form-control @error('jmlh_ruks') is-invalid @enderror" id="jmlh_ruks" name="jmlh_ruks" value="{{ old('jmlh_ruks', $data->jmlh_ruks) }}" placeholder="Masukkan Jumlah Ruang Kepala Sekolah">
                                    @error('jmlh_ruks')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Toilet -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="jmlh_toilet">Jumlah Toilet</label>
                                    <input type="number" class="form-control @error('jmlh_toilet') is-invalid @enderror" id="jmlh_toilet" name="jmlh_toilet" value="{{ old('jmlh_toilet', $data->jmlh_toilet) }}" placeholder="Masukkan Jumlah Toilet">
                                    @error('jmlh_toilet')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Kantin -->
                                <div class="form-group mt-3 col-md-12">
                                    <label for="jmlh_kantin">Jumlah Kantin</label>
                                    <input type="number" class="form-control @error('jmlh_kantin') is-invalid @enderror" id="jmlh_kantin" name="jmlh_kantin" value="{{ old('jmlh_kantin', $data->jmlh_kantin) }}" placeholder="Masukkan Jumlah Kantin">
                                    @error('jmlh_kantin')
                                        <div class="invalid-feedback">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Pra Sarana -->
                            <div class="my-4">
                                <h5 class="mb-3">Pra Sarana</h5>
                                
                                <!-- Pagar -->
                                <div class="form-group col-md-12">
                                    <label for="pagar">Pagar</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('pagar') is-invalid @enderror" type="radio" name="pagar" id="pagar1" value="Terpenuhi" {{ old('pagar', $data->pagar) == 'Terpenuhi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pagar1">Terpenuhi</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('pagar') is-invalid @enderror" type="radio" name="pagar" id="pagar2" value="Belum Terpenuhi" {{ old('pagar', $data->pagar) == 'Belum Terpenuhi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pagar2">Belum Terpenuhi</label>
                                    </div>
                                    @error('pagar')
                                        <div class="invalid-feedback d-block">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Gerbang -->
                                <div class="form-group col-md-12">
                                    <label for="gerbang">Gerbang</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gerbang') is-invalid @enderror" type="radio" name="gerbang" id="gerbang1" value="Terpenuhi" {{ old('gerbang', $data->gerbang) == 'Terpenuhi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gerbang1">Terpenuhi</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gerbang') is-invalid @enderror" type="radio" name="gerbang" id="gerbang2" value="Belum Terpenuhi" {{ old('gerbang', $data->gerbang) == 'Belum Terpenuhi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gerbang2">Belum Terpenuhi</label>
                                    </div>
                                    @error('gerbang')
                                        <div class="invalid-feedback d-block">* {{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Paving -->
                                <div class="form-group col-md-12">
                                    <label for="paving">Paving</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('paving') is-invalid @enderror" type="radio" name="paving" id="paving1" value="Terpenuhi" {{ old('paving', $data->paving) == 'Terpenuhi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="paving1">Terpenuhi</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('paving') is-invalid @enderror" type="radio" name="paving" id="paving2" value="Belum Terpenuhi" {{ old('paving', $data->paving) == 'Belum Terpenuhi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="paving2">Belum Terpenuhi</label>
                                    </div>
                                    @error('paving')
                                        <div class="invalid-feedback d-block">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Tombol Submit -->
                            <div class="form-group mt-3 col-md-12">
                                <button type="submit" class="btn btn-primary mt-4" style="background-color: #4c45b4; color: white;">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

