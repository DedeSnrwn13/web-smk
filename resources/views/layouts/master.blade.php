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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard/home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @if (Auth::user()->roles == 'ADMIN' || Auth::user()->roles == 'KEPSEK')
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('admin/dashboard/home*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/admin/dashboard/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">
            @if (Auth::user()->roles == 'ADMIN' || Auth::user()->roles == 'KEPSEK')
                <li class="nav-item {{ (request()->is('admin/dashboard/add') || request()->is('admin/dashboard/table/list/admin*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabAdmin"
                        aria-expanded="true" aria-controls="tabAdmin">
                        <i class="fas fa-users-cog"></i>
                        <span>Halaman Admin</span>
                    </a>
                    <div id="tabAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Admin</h6>
                            <a class="collapse-item" href="{{ route('add.admin') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.admin.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/teacher*') || request()->is('admin/dashboard/table/list/teacher*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabTeacher"
                        aria-expanded="true" aria-controls="tabTeacher">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Halaman Guru</span>
                    </a>
                    <div id="tabTeacher" class="collapse" aria-labelledby="headingTeacher" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Guru</h6>
                            <a class="collapse-item" href="{{ route('add.teacher') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.teacher.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/major*') || request()->is('admin/dashboard/table/list/major*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMajor"
                        aria-expanded="true" aria-controls="tabMajor">
                        <i class="fas fa-place-of-worship"></i>
                        <span>Halaman Jurusan</span>
                    </a>
                    <div id="tabMajor" class="collapse" aria-labelledby="headingMajor" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Jurusan</h6>
                            <a class="collapse-item" href="{{ route('add.major') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.major.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/class*') || request()->is('admin/dashboard/table/list/class*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabClass"
                        aria-expanded="true" aria-controls="tabClass">
                        <i class="fas fa-hourglass-half"></i>
                        <span>Halaman Kelas</span>
                    </a>
                    <div id="tabClass" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Kelas</h6>
                            <a class="collapse-item" href="{{ route('add.class') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.class.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/student*') || request()->is('admin/dashboard/table/list/student*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabStudent"
                        aria-expanded="true" aria-controls="tabStudent">
                        <i class="fas fa-user-graduate"></i>
                        <span>Halaman Siswa</span>
                    </a>
                    <div id="tabStudent" class="collapse" aria-labelledby="headingStudent" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Siswa</h6>
                            <a class="collapse-item" href="{{ route('add.student') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.student.list') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif
            @if (Auth::user()->roles == 'ADMIN')
                <li class="nav-item {{ (request()->is('admin/dashboard/add/ekskul*') || request()->is('admin/dashboard/table/list/ekskul*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabEkskul"
                        aria-expanded="true" aria-controls="tabEkskul">
                        <i class="fas fa-book"></i>
                        <span>Halaman Ekstrakulikuler</span>
                    </a>
                    <div id="tabEkskul" class="collapse" aria-labelledby="headingEkskul" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Ekstrakulikuler</h6>
                            <a class="collapse-item" href="{{ route('add.ekskul') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.ekskul.list') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif
            @if (Auth::user()->roles == 'ADMIN' || Auth::user()->roles == 'KEPSEK')
                <li class="nav-item {{ (request()->is('admin/dashboard/add/lesson*') || request()->is('admin/dashboard/table/list/lesson*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMapel"
                        aria-expanded="true" aria-controls="tabMapel">
                        <i class="fas fa-book"></i>
                        <span>Halaman Mapel</span>
                    </a>
                    <div id="tabMapel" class="collapse" aria-labelledby="headingMapel" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Mata Pelajaran</h6>
                            <a class="collapse-item" href="{{ route('add.lesson') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.lesson.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/jadwal*') || request()->is('admin/dashboard/table/list/jadwal*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabJadwal"
                        aria-expanded="true" aria-controls="tabJadwal">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Hal Jadwal Pelajaran</span>
                    </a>
                    <div id="tabJadwal" class="collapse" aria-labelledby="headingJadwal" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Jadwal Pelajaran</h6>
                            <a class="collapse-item" href="{{ route('add.jadwal') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.jadwal.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/materi*') || request()->is('admin/dashboard/table/list/materi*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMateri"
                        aria-expanded="true" aria-controls="tabMateri">
                        <i class="fab fa-leanpub"></i>
                        <span>Halaman Materi</span>
                    </a>
                    <div id="tabMateri" class="collapse" aria-labelledby="headingMateri" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Materi</h6>
                            <a class="collapse-item" href="{{ route('add.materi') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.materi.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/rpp*') || request()->is('admin/dashboard/table/list/rpp*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabRpp"
                        aria-expanded="true" aria-controls="tabRpp">
                        <i class="fas fa-map"></i>
                        <span>Halaman RPP</span>
                    </a>
                    <div id="tabRpp" class="collapse" aria-labelledby="headingRpp" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola RPP</h6>
                            <a class="collapse-item" href="{{ route('add.rpp') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.rpp.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/table/list/nilai/multi/x*') || request()->is('admin/dashboard/table/list/nilai/multi/xi*') || request()->is('admin/dashboard/table/list/nilai/multi/xii*') || request()->is('admin/dashboard/table/list/nilai/mutu/x*') || request()->is('admin/dashboard/table/list/nilai/mutu/xi*') || request()->is('admin/dashboard/table/list/nilai/mutu/xii*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabRapot"
                        aria-expanded="true" aria-controls="tabRapot">
                        <i class="fas fa-flag-checkered"></i>
                        <span>Halaman Rapot</span>
                    </a>
                    <div id="tabRapot" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Rapot</h6>
                            <a class="collapse-item" href="{{ route('table.nilai.list.multi10') }}">Table 10 Multimedia</a>
                            <a class="collapse-item" href="{{ route('table.nilai.list.multi11') }}">Table 11 Multimedia</a>
                            <a class="collapse-item" href="{{ route('table.nilai.list.multi12') }}">Table 12 Multimedia</a>
                            <hr>
                            <a class="collapse-item" href="{{ route('table.nilai.list.mutu10') }}">Table 10 Mutu</a>
                            <a class="collapse-item" href="{{ route('table.nilai.list.mutu11') }}">Table 11 Mutu</a>
                            <a class="collapse-item" href="{{ route('table.nilai.list.mutu12') }}">Table 12 Mutu</a>

                    </div>
                </li>

                <li class="nav-item {{ (request()->is('/admin/dashboard/add/nilai/multi/x*') || request()->is('/admin/dashboard/add/nilai/multi/xi*') || request()->is('/admin/dashboard/add/nilai/multi/xii*') || request()->is('/admin/dashboard/add/nilai/mutu/x*') || request()->is('/admin/dashboard/add/nilai/mutu/xi*') || request()->is('/admin/dashboard/add/nilai/mutu/xii*')) ? 'active' : '' }}">
	                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabNilai"
	                        aria-expanded="true" aria-controls="tabNilai">
	                        <i class="fas fa-flag-checkered"></i>
	                        <span>Halaman Nilai</span>
	                    </a>
	                    <div id="tabNilai" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
	                        <div class="bg-white py-2 collapse-inner rounded">
	                            <h6 class="collapse-header">Kelola Nilai</h6>
	                            <a class="collapse-item" href="{{ route('add.nilai.multi10') }}">Create 10 Multimedia</a>
                                <a class="collapse-item" href="{{ route('add.nilai.multi11') }}">Create 11 Multimedia</a>
                                <a class="collapse-item" href="{{ route('add.nilai.multi12') }}">Create 12 Multimedia</a>
                                <hr>
                                <a class="collapse-item" href="{{ route('add.nilai.mutu10') }}">Create 10 Mutu</a>
                                <a class="collapse-item" href="{{ route('add.nilai.mutu11') }}">Create 11 Mutu</a>
                                <a class="collapse-item" href="{{ route('add.nilai.mutu12') }}">Create 12 Mutu</a>

	                        </div>
	                    </div>
	            </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/add/info*') || request()->is('admin/dashboard/table/list/info*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabInfo"
                        aria-expanded="true" aria-controls="tabInfo">
                        <i class="fas fa-info-circle"></i>
                        <span>Halaman Informasi</span>
                    </a>
                    <div id="tabInfo" class="collapse" aria-labelledby="headingInfo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Informasi</h6>
                            <a class="collapse-item" href="{{ route('add.info') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.info.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/pembayaran*') || request()->is('admin/dashboard/table/list/pembayaran*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabJenisPembayaran"
                        aria-expanded="true" aria-controls="tabJenisPembayaran">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Jenis Pembayaran</span>
                    </a>
                    <div id="tabJenisPembayaran" class="collapse" aria-labelledby="headingJenisPembayaran" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Jenis Pembayaran</h6>
                            <a class="collapse-item" href="{{ route('add.pembayaran') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.pembayaran.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/pemasukan*') || request()->is('admin/dashboard/table/list/pemasukan*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabPemasukan"
                        aria-expanded="true" aria-controls="tabPemasukan">
                        <i class="fas fa-chart-line"></i>
                        <span>Halaman Pemasukan</span>
                    </a>
                    <div id="tabPemasukan" class="collapse" aria-labelledby="headingPemasukan" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Pemasukan</h6>
                            <a class="collapse-item" href="{{ route('add.pemasukan') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.pemasukan.list') }}">Table</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item {{ (request()->is('admin/dashboard/pengeluaran*') || request()->is('admin/dashboard/table/list/pengeluaran*')) ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabPengeluaran"
                        aria-expanded="true" aria-controls="tabPengeluaran">
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <span>Halaman Pengeluaran</span>
                    </a>
                    <div id="tabPengeluaran" class="collapse" aria-labelledby="headingPengeluaran" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola Pengeluaran</h6>
                            <a class="collapse-item" href="{{ route('add.pengeluaran') }}">Create</a>
                            <a class="collapse-item" href="{{ route('table.pengeluaran.list') }}">Table</a>
                        </div>
                    </div>
                </li>
            @endif
            @if(Auth::user()->roles == 'KEPSEK')
                    <li class="nav-item {{ (request()->is('laporan/pengeluaran*') || request()->is('laporan/pemasukan*')) || request()->is('laporan/arus-kas*') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabLaporan"
                            aria-expanded="true" aria-controls="tabLaporan">
                            <i class="fas fa-file-pdf"></i>
                            <span>Halaman Laporan</span>
                        </a>
                        <div id="tabLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Kelola Laporan</h6>
                                <a class="collapse-item" href="{{ route('list.pemasukan') }}">
                                    <i class="fas fa-chart-line"></i> Pemasukan
                                </a>
                                <a class="collapse-item" href="{{ route('list.pengeluaran') }}">
                                    <i class="fas fa-sort-amount-down-alt"></i> Pengeluaran
                                </a>
                                <a class="collapse-item" href="{{ route('list.kas') }}">
                                    <i class="fas fa-money-bill-alt"></i> Arus KAS
                                </a>
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
                @include('layouts.navbar')
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
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        $(document).ready(function({
            $('#no').autocomplete({
                source: function(request,response){
                    //feth data
                    $.ajax({
                        url: "{{route('rpp.getGuru')}}",
                        type: "post",
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data){
                            response(data);
                        }
                    });
                },
                select: function(event,ui){
                    $('#nama').val(ui.item.label);
                    $('#nik').val(ui.item.value);
                    return false;
                }
            });
        });

    </script>
    @stack('js')
</body>

</html>
