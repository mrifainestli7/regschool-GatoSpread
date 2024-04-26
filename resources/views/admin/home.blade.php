@extends('layouts.admin')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Kelola Akun</h4>
            {{-- start here --}}
            <div class="container">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Data akun</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table id="dataTables" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>email</th>
                                        <th>Tanggal dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($data->pfp) }}" class="avatar img-fluid rounded" alt=""></td>
                                        <td>{{ $data->nip }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                        <td>
                                            <a href="{{ route('admin.detail-akun', $data->id) }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-hand-index"></i>
                                                Pilih
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end here --}}
        </div>
    </div>
@endsection