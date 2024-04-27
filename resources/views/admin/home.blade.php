@extends('layouts.admin')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Kelola Akun</h4>
            {{-- start here --}}
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card " >
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col" >NIP</th>
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">E-mail</th>
                                                    <th scope="col" class="text-center">No Telp</th>
                                                    <th scope="col" class="text-center">Tanggal dibuat</th>
                                                    <th scope="col" class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($datas as $key => $data)
                                                <tr>
                                                    <th class="text-center">
                                                        <div class="user-avatar float-xl-left pr-4 float-none">
                                                             <img src="{{ asset($data->pfp) }}" alt="User Avatar" class="rounded-circle user-avatar-xl"  style="width: 30px ;">
                                                        </div>
                                                    </th>
                                                        <td class='align-middle'>{{ $data->nip }}</td>
                                                        <td class="text-center align-middle">{{ $data->name }}</td>
                                                        <td class="text-center align-middle">{{ $data->email }}</td>
                                                        <td class="text-center align-middle">{{ $data->phone }}</td>
                                                        <td class="text-center align-middle">{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ route('admin.detail-akun', $data->id)}}" class="btn btn-success btn-sm rounded-4 mx-2 my-2" style="background-color: #4c45b4;">
                                                            <i class="bi bi-hand-index "></i>
                                                            <p2 class="px-2 py-1">Edit Akun</p2>
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