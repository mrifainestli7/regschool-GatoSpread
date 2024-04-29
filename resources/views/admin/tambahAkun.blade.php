
@extends('layouts.admin')

@section('container')
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Tambah akun</h4>
            {{-- start here --}}

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-17">
                        <div class="card">
                            <div class="card-header" style="background-color: #4c45b4; color: white;">
                                Input data akun
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data" id="formAddAccount">
                                    @csrf
                                    <!-- NIP -->
                                    <div class="form-group mb-3">
                                        <label for="nip">NIP*</label>
                                        <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP">
                                    </div>
                                    @error('nip')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nama -->
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama*</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                                    </div>
                                    @error('nama')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Nomor Telepon -->
                                    <div class="form-group mb-3">
                                        <label for="nomor_telepon">Nomor Telepon*</label>
                                        <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Masukkan Nomor Telepon">
                                    </div>
                                    @error('nomor_telepon')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- E-mail -->
                                    <div class="form-group mb-3">
                                        <label for="email">E-mail*</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan E-mail">
                                    </div>
                                    @error('email')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Password -->
                                    <div class="form-group mb-3">
                                        <label for="password">Password*</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password">
                                    </div>
                                    @error('password')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <div class="form-group ">
                                        <label for="picture">Foto Profil*</label>
                                        <input type="file" class="form-control rounded" id="picture" name="picture">
                                    </div>
                                    @error('picture')
                                        <div class="error">* {{ $message }}</div>
                                    @enderror
                                    <!-- Tombol Submit -->
                                    <button type="button" class="btn btn-primary mt-4 move-right" style="background-color: #4c45b4; color: white;" onclick="checkForm()">Submit</button>
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
