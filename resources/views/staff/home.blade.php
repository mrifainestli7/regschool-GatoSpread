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
            <h4 class="mt-2 mb-4">Dashboard Data Sekolah</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered first">
                            <thead>
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
                            </thead>
                            <tbody>
                                <tr>
                                    <td>SDN 08 PATUMBAK</td>
                                    <td>2100018345</td>
                                    <td>Negeri</td>
                                    <td>10</td>
                                    <td>8</td>
                                    <td>240</td>
                                    <td>2</td>
                                    <td>20</td>
                                </tr>
                                <!-- Additional rows here -->
                                <tr>
                                    <td>SD 02 PATUMBAK</td>
                                    <td>2100018345</td>
                                    <td>Swasta</td>
                                    <td>10</td>
                                    <td>8</td>
                                    <td>240</td>
                                    <td>2</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>SDN 01 PATUMBAK</td>
                                    <td>2100018345</td>
                                    <td>Negeri</td>
                                    <td>6</td>
                                    <td>20</td>
                                    <td>240</td>
                                    <td>2</td>
                                    <td>20</td>
                                </tr>
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
        dom: '<"top"lBf><"br">rt<"bottom"ip><"clear">',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
        ]
    });
});
</script>
