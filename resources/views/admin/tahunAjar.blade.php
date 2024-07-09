@extends('layouts.admin')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Tahun Ajar</h4>
            <div class="row">
                <div class="col-lg-8">
                    <div class="shadow col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 rounded">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Tahun Ajar</th>
                                                <th scope="col" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($datas as $key => $data)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $data->tahunAjar1 }}/{{ $data->tahunAjar2 }}</td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('admin.ubahTahun', ['id' => $data->id_thnAjar])}}" class="btn btn-success btn-sm rounded-4 mx-2 my-2" style="background-color: #4c45b4;">
                                                            <i class="bi bi-hand-index"></i>
                                                            <span class="px-2 py-1">Ubah</span>
                                                        </a>
                                                        <a href="{{ route('admin.hapusTahun', ['id' => $data->id_thnAjar])}}" class="btn btn-success btn-sm rounded-4 mx-2 my-2" style="background-color: #ee5151;">
                                                            <i class="bi bi-hand-index"></i>
                                                            <span class="px-2 py-1">Hapus</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-center">
                                                        <div class="alert alert-danger">Data Post belum Tersedia.</div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="shadow col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 rounded">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tambah Tahun Ajar</h5>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row align-items-end">
                                        <div class="col-md-5 mb-3">
                                            <label for="tahun_ajar1" class="form-label">Tahun Ajar :</label>
                                            <input type="number" class="form-control" id="tahun_ajar1" name="tahun_ajar1" value="{{ old('tahun_ajar1') }}" required>
                                        </div>
                                        <div class="col-md-1 text-center mb-3">
                                            <label class="form-label">/</label>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="tahun_ajar2" class="form-label" style="visibility: hidden;">Tahun Ajar 2</label>
                                            <input type="number" class="form-control" id="tahun_ajar2" name="tahun_ajar2" value="{{ old('tahun_ajar2') }}" required>
                                        </div>
                                        @if ($errors->any())     
                                            @foreach ($errors->all() as $error)
                                                <div class="error">* {{ $error }}</div>
                                            @endforeach
                                        @endif                                        
                                        <div class="md-5 mb-3">
                                            <p>*contoh : 2022 / 2023 </p>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="background-color: #4c45b4">
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
