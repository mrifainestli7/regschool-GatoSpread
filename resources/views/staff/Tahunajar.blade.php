@extends('layouts.main')

@section('container')
<div class="container-fluid">
        <div class="mb-3 ">
            <h4 class="mt-2 mb-4">Update Tahun Ajar</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Profil Sekolah</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Tahun Ajar </li>
                        </ol>              
                    </nav>      
                    </div> 
                </div>
                <div class="col-md-8">
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary move-right" style="background-color: #4c45b4; color: white;"> 
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                    </div> 
                </div>
            </div>
            {{-- start here --}}

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-17">
                        <div class="card">
                            <div class="card-header" style="background-color: #4c45b4; color: white;">
                                Input data Tahun Ajar
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data" id="formAddAccount">
                                    @csrf
                                    <!-- Tahun Ajar -->
                                    <div class="form-group mt-3">
                                        <label for="tahun_ajar">Tahun Ajar</label>
                                        <input type="number" class="form-control @error('tahun_ajar') is-invalid @enderror" id="tahun_ajar" name="tahun_ajar" value="" placeholder="Masukkan Tahun Ajar" >
                                    </div>
                                    @error('tahun_ajar')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Kepala Sekolah -->
                                    <div class="form-group mt-3">
                                        <label for="namaKepsek">Nama Kepala Sekolah</label>
                                        <input type="text" class="form-control @error('namaKepsek') is-invalid @enderror" id="namaKepsek" name="namaKepsek" value="{{ old('namaKepsek') }}" placeholder="Masukkan Nama Kepala Sekolah" >
                                    </div>
                                    @error('namaKepsek')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nomor Hp Kepala Sekolah -->
                                    <div class="form-group mt-3">
                                        <label for="noHpKepsek">Nomor Telepon</label>
                                        <input type="text" class="form-control @error('noHpKepsek') is-invalid @enderror" id="noHpKepsek" name="noHpKepsek" value="{{ old('noHpKepsek') }}" placeholder="Masukkan Nomor Telepon" >
                                    </div>
                                    @error('noHpKepsek')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                     <!-- Jumlah Guru Honorer -->
                                     <div class="form-group mt-3">
                                        <label for="jmlGuruHonor">Jumlah Guru Hononer</label>
                                        <input type="text" class="form-control @error('jmlGuruHonor') is-invalid @enderror" id="jmlGuruHonor" name="jmlGuruHonor" value="{{ old('jmlGuruHonor') }}" placeholder="Masukkan Jumlah Guru Honor" >
                                    </div>
                                    @error('jmlGuruHonor')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                       <!-- Jumlah Guru PNS -->
                                       <div class="form-group mt-3">
                                        <label for="jmlGuruPNS">Jumlah Guru PNS</label>
                                        <input type="text" class="form-control @error('jmlGuruPNS') is-invalid @enderror" id="jmlGuruPNS" name="jmlGuruPNS" value="{{ old('jmlGuruPNS') }}" placeholder="Masukkan Jumlah Guru PNS" >
                                    </div>
                                    @error('jmlGuruPNS')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                      <!-- Jumlah Rombel -->
                                      <div class="form-group mt-3">
                                        <label for="jmlRombel">Jumlah Rombel</label>
                                        <input type="text" class="form-control @error('jmlRombel') is-invalid @enderror" id="jmlRombel" name="jmlRombel" value="{{ old('jmlRombel') }}" placeholder="Masukkan Jumlah Rombel" >
                                    </div>
                                    @error('jmlRombel')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                      <!-- Jumlah Murid Pria -->
                                      <div class="form-group mt-3">
                                        <label for="jmlpria">Jumlah Murid Pria</label>
                                        <input type="text" class="form-control @error('jmlpria') is-invalid @enderror" id="jmlpria" name="jmlpria" value="{{ old('jmlpria') }}" placeholder="Masukkan Jumlah Murid Laki-Laki" >
                                    </div>
                                    @error('jmlpria')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                      <!-- Jumlah Murid Wanita -->
                                      <div class="form-group mt-3">
                                        <label for="jmlwanita">Jumlah Murid Wanita</label>
                                        <input type="text" class="form-control @error('jmlwanita') is-invalid @enderror" id="jjmlwanita" name="jmlwanita" value="{{ old('jmlwanita') }}" placeholder="Masukkan Jumlah Murid Wanita" >
                                    </div>
                                    @error('jmlwanita')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- ID Sekolah -->
                                    <div class="form-group mt-3">
                                        <label for="id_sekolah">ID Sekolah</label>
                                        <input type="text" class="form-control @error('id_sekolah') is-invalid @enderror" id="id_sekolah" name="id_sekolah" value="{{ old('id_sekolah') }}" placeholder="Masukkan ID Sekolah" >
                                    </div>
                                    @error('id_sekolah')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Tombol Submit -->
                                    <button type="submit" class="btn btn-primary mt-4 move-right " style="background-color: #4c45b4; color: white;
                                    ">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- end here --}}

            <!-- Pop-up Error -->
            <div id="popupError" class="popup" style="display: none;">
                <div class="popup-content">
                    <span class="close" onclick="closeErrorPopup()">&times;</span>
                    <p>Harap isi semua kolom yang bertanda *</p>
                </div>
            </div>

            <!-- Pop-up Success -->
            <div id="popupSuccess" class="popup" style="display: none;">
                <div class="popup-content">
                    <span class="close" onclick="closeSuccessPopup()">&times;</span>
                    <p>Akun berhasil ditambahkan!</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Popup container */
        .popup {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        /* Popup content */
        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 5px;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <script>
        function checkForm() {
            var inputs = document.getElementById('formAddAccount').querySelectorAll('input');
            var isValid = true;
            inputs.forEach(function(input) {
                if (input.value.trim() === "") {
                    isValid = false;
                }
            });
            if (!isValid) {
                document.getElementById('popupError').style.display = 'block';
            } else {
                // Simulate submission success (remove this line in real usage)
                setTimeout(function() {
                    document.getElementById('popupSuccess').style.display = 'block';
                }, 1000);
                // In real usage, you would submit the form here
                // document.getElementById('formAddAccount').submit();
            }
        }

        function closeErrorPopup() {
            document.getElementById('popupError').style.display = 'none';
        }

        function closeSuccessPopup() {
            document.getElementById('popupSuccess').style.display = 'none';
        }
    </script>
@endsection
