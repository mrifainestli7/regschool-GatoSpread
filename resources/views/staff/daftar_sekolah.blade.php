@extends('layouts.main')

@section('container')
<head>
    <title>Sekolah di {{ $kecamatan->nama_kecamatan }}</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Sekolah Dasar di {{ $kecamatan->nama_kecamatan }}</h4>
            <!-- <div class="row">
                <div class="col-md-2">
                    
                    </div>  -->
                    <div class="row mt-2 mb-4">
                    <div class="col-md-4">
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Daftar Kecamatan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ubah Rekap </li>
                                </ol>              
                            </nav>      
                        </div>
                    </div>
                    <div class="col-md-8 text-end">
                       
                        <div class="form-group">
                            <div class="dropdown ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="btn btn-secondary dropdown-toggle rounded-4" style="background-color: #857ac6" data-bs-toggle="dropdown" 
                                        id="dropdownMenuButton" href="#" role="button" aria-expanded="false">Tahun Ajar : </a>
                                    <ul class="dropdown-menu rounded-4" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Ubah Data Rekap</a></li>
                                        <li><a class="dropdown-item" href="#">Tambah Data Rekap</a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Sarpras</a></li>
                                        <li><a class="dropdown-item" href="#">Tambah Data Sarpras </a></li>
                                        <li><a class="dropdown-item" href="#">Ubah Data Sekolah</a></li>
                                        <li><a class="dropdown-item" href="#" style="background-color: #e15555;">Hapus Data Sekolah </a></li>
                                    </ul>
                                </li>
                            </div>
                        </div> 
                    </div>
                </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>NPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Status</th>
                                    <th>Jumlah Guru</th>
                                    <th>Jumlah Murid</th>
                                    <th>Rombel</th>
                                    <th>Ruang Kelas</th>
                                    <th>Kebutuhan RKB</th>
                                    
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
                                    <td>{{ $sekolah->rekap ? ($sekolah->rekap->jmlGuruHonor + $sekolah->rekap->jmlGuruPNS) : '-' }}</td>
                                    <td>{{ $sekolah->rekap ? ($sekolah->rekap->jmlMuridPria + $sekolah->rekap->jmlMuridWanita) : '-' }}</td>
                                    <td>{{ $sekolah->rekap ? $sekolah->rekap->jmlRombel : '-' }}</td>
                                    <td>{{ $sekolah->sarpras ? $sekolah->sarpras->jmlh_rk : '-' }}</td>
                                    <td>{{ $sekolah->sarpras ?  max($sekolah->rekap->jmlRombel - $sekolah->sarpras->jmlh_rk, 0) : '-' }}</td>
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
        </div>
    </div>
@endsection

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<!-- DataTables ColVis JS -->
<script src="https://cdn.datatables.net/colvis/1.1.3/js/dataTables.colVis.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: '<"top"Bf><"br">rt<"bottom"><"clear">', // Hapus 'l' dan 'i' untuk menghilangkan "Show entries" dan "Showing ... of ... entries"
        paging: false, // Hapus pagination
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
        ]
    });
});
</script>