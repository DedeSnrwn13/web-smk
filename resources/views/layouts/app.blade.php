<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @laravelPWA
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- CSS -->
    @yield('css')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @if (Auth::user()->roles == 'GURU' || Auth::user()->roles == 'SISWA')
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">
            @if (Auth::user()->roles == 'GURU')
                <li class="nav-item {{ request()->is('daftar-kelas*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabClass"
                        aria-expanded="true" aria-controls="tabClass">
                        <i class="fas fa-hourglass-half"></i>
                        <span>Kelas</span>
                    </a>
                    <div id="tabClass" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Daftar Kelas</h6>
                            <a class="collapse-item" href="{{ route('kelas') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ request()->is('daftar-siswa*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabStudent"
                        aria-expanded="true" aria-controls="tabStudent">
                        <i class="fas fa-user-graduate"></i>
                        <span>Siswa</span>
                    </a>
                    <div id="tabStudent" class="collapse" aria-labelledby="headingStudent" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Daftar Siswa</h6>
                            <a class="collapse-item" href="{{ route('siswa') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->roles == 'GURU' || Auth::user()->roles == 'SISWA')
                <li class="nav-item {{ request()->is('daftar-mapel*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMapel"
                        aria-expanded="true" aria-controls="tabMapel">
                        <i class="fas fa-book"></i>
                        <span>Mata Pelajaran</span>
                    </a>
                    <div id="tabMapel" class="collapse" aria-labelledby="headingMapel" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Daftar Mapel</h6>
                            <a class="collapse-item" href="{{ route('mapel') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ request()->is('daftar-jadwal*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabJadwal"
                        aria-expanded="true" aria-controls="tabJadwal">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Jadwal Pelajaran</span>
                    </a>
                    <div id="tabJadwal" class="collapse" aria-labelledby="headingJadwal" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Daftar Jadwal Pelajaran</h6>
                            <a class="collapse-item" href="{{ route('jadwal') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->roles == 'SISWA')
                <li class="nav-item {{ request()->is('daftar-materi*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMateri"
                        aria-expanded="true" aria-controls="tabMateri">
                        <i class="fab fa-leanpub"></i>
                        <span>Materi</span>
                    </a>
                    <div id="tabMateri" class="collapse" aria-labelledby="headingMateri" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Daftar Materi</h6>
                            <a class="collapse-item" href="{{ route('materi') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->roles == 'GURU')
                <li class="nav-item {{ (request()->is('buat-materi*') || request()->is('daftar-materi*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMateri"
                        aria-expanded="true" aria-controls="tabMateri">
                        <i class="fab fa-leanpub"></i>
                        <span>Materi</span>
                    </a>
                    <div id="tabMateri" class="collapse" aria-labelledby="headingMateri" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Materi</h6>
                            <a class="collapse-item" href="{{ route('materi.create') }}">Create</a>
                            <a class="collapse-item" href="{{ route('materi') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('buat-rpp*') || request()->is('daftar-rpp*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabRpp"
                        aria-expanded="true" aria-controls="tabRpp">
                        <i class="fas fa-map"></i>
                        <span>RPP</span>
                    </a>
                    <div id="tabRpp" class="collapse" aria-labelledby="headingRpp" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola RPP</h6>
                            <a class="collapse-item" href="{{ route('rpp.create') }}">Create</a>
                            <a class="collapse-item" href="{{ route('rpp') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->roles == 'GURU' || Auth::user()->roles == 'SISWA')
                <li class="nav-item {{ request()->is('daftar-informasi*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabInfo"
                        aria-expanded="true" aria-controls="tabInfo">
                        <i class="fas fa-info-circle"></i>
                        <span>Informasi</span>
                    </a>
                    <div id="tabInfo" class="collapse" aria-labelledby="headingInfo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Daftar Informasi</h6>
                            <a class="collapse-item" href="{{ route('info') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->roles == 'SISWA')
                <li class="nav-item {{ request()->is('tagihan*') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabTagihan"
                        aria-expanded="true" aria-controls="tabTagihan">
                        <i class="fas fa-info-circle"></i>
                        <span>Tagihan Saya</span>
                    </a>
                    <div id="tabTagihan" class="collapse" aria-labelledby="headingTagihan" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Daftar Tagihan</h6>
                            <a class="collapse-item" href="{{ route('tagihan-siswa') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->admin->nama ?? Auth::user()->name }}</span>
                                @if (Auth::user()->roles == 'GURU' || Auth::user()->roles == 'SISWA')
                                    <i class="fas fa-user pl-2"></i>
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>

                <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah {{ Auth::user()->name }} Ingin Keluar?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    @stack('js')
</body>
</html>

