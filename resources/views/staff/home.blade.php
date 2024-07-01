@extends('layouts.main')

@section('container')
<<<<<<< Updated upstream
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Dashboard</h4>
            
=======
<head>
    <title>Dashboard</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Dashboard Data Sekolah</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>NPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Status</th>
                                    <th>Rombel</th>
                                    <th>Ruang Kelas</th>
                                    <th>Jumlah Murid</th>
                                    <th>Kebutuhan RKB</th>
                                    <th>Jumlah Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sekolahs as $sekolah)
                                <tr>
                                    <td>{{ $sekolah->npsn }}</td>
                                    <td>
                                        <a href="{{ route('staff.profile_sekolah', ['id_sekolah' => $sekolah->id_sekolah]) }}">
                                            {{ $sekolah->nama_sekolah }}
                                        </a>
                                    </td>
                                    <td>{{ $sekolah->status }}</td>
                                    <td>{{ $sekolah->rekap ? $sekolah->rekap->jmlRombel : '-' }}</td>
                                    <td>{{ $sekolah->sarpras ? $sekolah->sarpras->jmlh_rk : '-' }}</td>
                                    <td>{{ $sekolah->rekap ? ($sekolah->rekap->jmlMuridPria + $sekolah->rekap->jmlMuridWanita) : '-' }}</td>
                                    <td>{{ $sekolah->sarpras ?  max($sekolah->rekap->jmlRombel - $sekolah->sarpras->jmlh_rk, 0) : '-' }}</td>
                                    <td>{{ $sekolah->rekap ? ($sekolah->rekap->jmlGuruHonor + $sekolah->rekap->jmlGuruPNS) : '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <th>NPSN</th>
                                    <th>Status</th>
                                    <th>Rombel</th>
                                    <th>Ruang Kelas</th>
                                    <th>Jumlah Murid</th>
                                    <th>Kebutuhan RKB</th>
                                    <th>Jumlah Guru</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
>>>>>>> Stashed changes
        </div>
    </div>
@endsection