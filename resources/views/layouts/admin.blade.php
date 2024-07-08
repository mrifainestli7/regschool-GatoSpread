<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegSchools</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <style>
        .sidebar-item.selected {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan saat item dipilih */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">

            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo border-bottom">
                    <a href="#">RegSchools</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="/admin/home" class="sidebar-link">
                            <i class="fa-solid fa-home pe-2"></i>
                            Kelola Akun
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin/tambah-akun" class="sidebar-link">
                            <i class="fa-solid fa-file pe-2"></i>
                            Tambah Akun
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin/kelola_tahunAjar" class="sidebar-link">
                            <i class="fa-solid fa-calendar pe-2"></i>
                            Tahun Ajar
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin/profile" class="sidebar-link"><i class="fa-regular fa-user pe-2"></i>
                            Profile
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/logout" class="sidebar-link"><i class="fa-solid fa-sign-out-alt pe-2"></i>
                            Log Out
                        </a>  
                    </li>                   
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ asset(Auth::user()->pfp) }}" class="avatar img-fluid rounded border" alt="">
                            </a>                            
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="/admin/profile" class="dropdown-item">Profile</a>
                                <a href="/logout" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <a href="#" class="theme-toggle">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-sun"></i>
                </a>
            </nav>

            {{-- Here start main content page--}}
            <main class="content px-3 py-2">
                @yield('container')
            </main>
            
            {{-- Here is footer --}}
            <footer class="footer px-2 py-1 border-top">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>GatoSpread</strong>
                                </a>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
    // Menghapus kelas 'selected' dari semua item sidebar saat halaman dimuat
    window.addEventListener('DOMContentLoaded', () => {
        sidebarItems.forEach(item => {
            item.classList.remove('selected');
        });
    });

    // Menandai item sidebar yang dipilih
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    sidebarItems.forEach(item => {
        item.addEventListener('click', () => {
            sidebarItems.forEach(item => {
                item.classList.remove('selected');
            });
            item.classList.add('selected');
        });
    });
</script>

</body>

</html>
