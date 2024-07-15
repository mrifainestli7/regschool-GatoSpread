@extends('layouts.main')

@section('container')
<head>   
    <title>Dashboard</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>
    <div class="container-fluid">
        <div class="mb-3">
            <h4 class="mt-2 mb-4">Daftar Kecamatan</h4>
            <div class="col-md-4">
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Daftar Kecamatan</li>
                        </ol>              
                    </nav>      
                    </div> 
                </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Kecamatan</th>
                                    <th>Jumlah SD Negeri</th>
                                    <th>Jumlah SD Swasta</th>
                                    <th>Total SD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kecamatans as $key => $kecamatan)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td><a href="{{ route('staff.daftarSekolah', $kecamatan->id_kecamatan) }}">{{ $kecamatan->nama_kecamatan }}</a></td>
                                    <td class="text-center">{{ $kecamatan->jumlahNegeri() }}</td>
                                    <td class="text-center">{{ $kecamatan->jumlahSwasta() }}</td>
                                    <td class="text-center">{{ $kecamatan->jumlahSekolah() }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data tidak tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Kecamatan</th>
                                    <th>Jumlah SD Negeri</th>
                                    <th>Jumlah SD Swasta</th>
                                    <th>Total SD</th>
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
