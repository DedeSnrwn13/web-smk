<?php

use Illuminate\Support\Facades\{Route, Auth};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'home'     => false,
    'login'    => false,
]);

Route::middleware('guest')->group(function () {
    // Login Admin
    Route::get('/login/web-smk/admin/sch', 'FrontController@loginAdmin')->name('login.admin');
    Route::post('/login/web-smk/admin/sch', 'FrontController@postLoginAdmin');

    // Login
    Route::get('/login', 'FrontController@login')->name('login.guest');
    Route::post('/login', 'FrontController@postLogin')->name('post.login.guest');
});

Route::group(['middleware' => ['auth', 'cek.role:GURU,SISWA']], function () {
    Route::get('/home', 'FrontController@home')->name('home.teacher');

    Route::get('/daftar-informasi', 'FrontController@tabelInfo')->name('info');
    Route::get('/daftar-informasi/{id}/lampiran', 'FrontController@lampiranInfo');

    Route::get('/daftar-mapel', 'FrontController@tabelMapel')->name('mapel');

    Route::get('/daftar-materi', 'FrontController@tableMateriSiswa')->name('materi');

    Route::get('/daftar-jadwal', 'FrontController@tabelJadwal')->name('jadwal');
});

Route::group(['middleware' => ['auth', 'cek.role:GURU']], function () {
    Route::get('/daftar-siswa', 'FrontController@tabelSiswa')->name('siswa');

    Route::get('/daftar-kelas', 'FrontController@tabelKelas')->name('kelas');

    // Materi
    Route::get('/buat-materi', 'FrontController@materiCreate')->name('materi.create');
    Route::post('/buat-materi/store', 'FrontController@materiPostCreate');
    // Detail
    Route::get('/materi/{id}/detail', 'FrontController@detailMateri')->name('view.materi');
    // Edit Jadwal
    Route::get('/materi/{id}/edit', 'FrontController@editMateri');
    Route::put('/materi/{id}/update', 'FrontController@updateMateri');
    // Hapus Jadwal
    Route::delete('/materi/{id}/destroy', 'FrontController@destroyMateri');

    // RPP
    Route::get('/buat-rpp', 'FrontController@rppCreate')->name('rpp.create');
    Route::post('/buat-rpp/store', 'FrontController@rppPostCreate');
    // Detail
    Route::get('/rpp/{id}/detail', 'FrontController@detailRpp')->name('view.rpp');
    // Table
    Route::get('/daftar-rpp', 'FrontController@tableRpp')->name('rpp');
    // Edit Jadwal
    Route::get('/rpp/{id}/edit', 'FrontController@editRpp');
    Route::put('/rpp/{id}/update', 'FrontController@updateRpp');
    // Hapus Jadwal
    Route::delete('/rpp/{id}/destroy', 'FrontController@destroyRpp');

});

Route::group(['middleware' => ['auth', 'cek.role:SISWA']], function () {

    Route::get('/daftar-nilai', 'FrontController@tabelNilai')->name('nilai');

    Route::get('/tagihan', 'FrontController@tagihan')->name('tagihan-siswa');
});

Route::group(['middleware' => ['auth', 'cek.role:KEPSEK']], function() {
    // Laporan pengeluan
    Route::get('laporan/pengeluaran', 'LapKeuanganController@pengeluaran')->name('list.pengeluaran');
    Route::get('laporan/cetak-pengeluaran', 'LapKeuanganController@pengeluaranPdf')->name('cetak.pengeluaran');
    Route::get('laporan/cetak-pengeluaran/{id}', 'LapKeuanganController@pengeluaranId')->name('cetak.pengeluaran.id');

    // Laporan Pemasukan
    Route::get('laporan/pemasukan', 'LapKeuanganController@pemasukan')->name('list.pemasukan');
    Route::get('laporan/cetak-pemasukan', 'LapKeuanganController@pemasukanPdf')->name('cetak.pemasukan');
    Route::get('laporan/cetak-pemasukan/{id}', 'LapKeuanganController@pemasukanId')->name('cetak.pemasukan.id');

    // Laporan arus Khas
    Route::get('laporan/arus-kas', 'LapKeuanganController@kas')->name('list.kas');
    Route::get('laporan/cetak-kas', 'LapKeuanganController@kasPdf')->name('cetak.kas');
});

Route::group(['middleware' => ['auth', 'cek.role:ADMIN,KEPSEK']], function() {
    Route::get('/admin/dashboard/home', 'AdminController@index');
    // logout Admin
    Route::get('/admin/dashboard/logout', 'AdminController@logoutAdmin');
});

Route::group(['middleware' => ['auth', 'cek.role:ADMIN,KEPSEK']], function() {
    // Admin
    Route::get('/admin/dashboard/add', 'AdminController@addAdmin')->name('add.admin');
    Route::post('/admin/dashboard/add/store', 'AdminController@postAddAdmin');
    // Table
    Route::get('/admin/dashboard/table/list/admin', 'AdminController@tableAdmin')->name('table.admin.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/admin/{id}/detail', 'AdminController@detailAdmin')->name('view.detail.admin');
    // Edit
    Route::get('/admin/dashboard/table/list/admin/{id}/edit', 'AdminController@editAdmin')->name('edit.admin');
    Route::put('/admin/dashboard/table/list/admin/{id}/update', 'AdminController@updateAdmin')->name('update.admin');
    // Ganti Password
    Route::get('/admin/dashboard/table/list/admin/{id}/edit/password', 'AdminController@editPasswordAdmin')->name('edit.password.admin');
    Route::post('/admin/dashboard/table/list/admin/{id}/update/password', 'AdminController@updatePasswordAdmin')->name('update.password.admin');
    // Import Admin
    Route::post('/admin/dashboard/add/admin/import', 'AdminController@importAdmin');
    // Hapus Admin
    Route::delete('/admin/dashboard/table/list/admin/{id}/destroy', 'AdminController@destroyAdmin')->name('destroy.admin');


    // Pengeluaran
    Route::get('/admin/dashboard/pengeluaran', 'PengeluaranController@addPengeluaran')->name('add.pengeluaran');
    Route::post('/admin/dashboard/pengeluaran/store', 'PengeluaranController@postAddPengeluaran');
    // Table
    Route::get('/admin/dashboard/table/list/pengeluaran', 'PengeluaranController@tablePengeluaran')->name('table.pengeluaran.list');
    // Edit
    Route::get('/admin/dashboard/table/list/pengeluaran/{id}/edit', 'PengeluaranController@editPengeluaran')->name('edit.pengeluaran');
    Route::put('/admin/dashboard/table/list/pengeluaran/{id}/update', 'PengeluaranController@updatePengeluaran')->name('update.pengeluaran');
    // Hapus Admin
    Route::delete('/admin/dashboard/table/list/pengeluaran/{id}/destroy', 'PengeluaranController@destroyPengeluaran')->name('destroy.pengeluaran');

    // Pemasukan
    Route::get('/admin/dashboard/pemasukan', 'PemasukanController@pemasukan')->name('add.pemasukan');
    Route::post('/admin/dashboard/pemasukan/store', 'PemasukanController@postPemasukan');
    Route::get('/tagihan-siswa/{id}', 'PemasukanController@getData');
    // Route::get('/tagihan-siswa', 'PemasukanController@getData')->name('get.data.tagihan');
    // Table
    Route::get('/admin/dashboard/table/list/pemasukan', 'PemasukanController@tablePemasukan')->name('table.pemasukan.list');
    // Edit
    Route::get('/admin/dashboard/table/list/pemasukan/{id}/edit', 'PemasukanController@editPemasukan')->name('edit.pemasukan');
    Route::put('/admin/dashboard/table/list/pemasukan/{id}/update', 'PemasukanController@updatePemasukan')->name('update.pemasukan');
    // Hapus Admin
    Route::delete('/admin/dashboard/table/list/pemasukan/{id}/destroy', 'PemasukanController@destroyPemasukan')->name('destroy.pemasukan');

    // Jenis Pembayaran
    Route::get('/admin/dashboard/pembayaran', 'JenisPembayaranController@pembayaran')->name('add.pembayaran');
    Route::get('/admin/dashboard/jumlah/{pembayaran}', 'JenisPembayaranController@jumlahPembayaran');
    Route::post('/admin/dashboard/pembayaran/store', 'JenisPembayaranController@postPembayaran');
    // Table
    Route::get('/admin/dashboard/table/list/pembayaran', 'JenisPembayaranController@tablePembayaran')->name('table.pembayaran.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/pembayaran/{id}/detail', 'JenisPembayaranController@detailPembayaran')->name('view.detail.pembayaran');
    // Edit
    Route::get('/admin/dashboard/table/list/pembayaran/{id}/edit', 'JenisPembayaranController@editPembayaran')->name('edit.pembayaran');
    Route::put('/admin/dashboard/table/list/pembayaran/{id}/update', 'JenisPembayaranController@updatePembayaran')->name('update.pembayaran');
    // Hapus Admin
    Route::delete('/admin/dashboard/table/list/pembayaran/{id}/destroy', 'JenisPembayaranController@destroyPembayaran')->name('destroy.pembayaran');

    // Guru
    Route::get('/admin/dashboard/add/teacher', 'GuruController@addTeacher')->name('add.teacher');
    Route::post('/admin/dashboard/add/teacher/store', 'GuruController@postAddTeacher');
    // Table
    Route::get('/admin/dashboard/table/list/teacher', 'GuruController@tableTeacher')->name('table.teacher.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/teacher/{id}/detail', 'GuruController@detailTeacher')->name('view.detail.teacher');
    // Edit
    Route::get('/admin/dashboard/table/list/teacher/{id}/edit', 'GuruController@editTeacher')->name('edit.teacher');
    Route::put('/admin/dashboard/table/list/teacher/{id}/update', 'GuruController@updateTeacher')->name('update.teacher');
    // Ganti Password
    Route::get('/admin/dashboard/table/list/teacher/{id}/edit/password', 'GuruController@editPasswordTeacher')->name('edit.password.teacher');
    Route::post('/admin/dashboard/table/list/teacher/{id}/update/password', 'GuruController@updatePasswordTeacher')->name('update.password.teacher');
    // Import Guru
    Route::post('/admin/dashboard/add/teacher/import', 'GuruController@importTeacher');
    // Hapus Guru
    Route::delete('/admin/dashboard/table/list/teacher/{id}/destroy', 'GuruController@destroyTeacher')->name('destroy.teacher');


    // Siswa
    Route::get('/admin/dashboard/add/student', 'SiswaController@addStudent')->name('add.student');

    Route::post('/admin/dashboard/add/student/store', 'SiswaController@postAddStudent');
    // Table
    Route::get('/admin/dashboard/table/list/student', 'SiswaController@tableStudent')->name('table.student.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/student/{id}/detail', 'SiswaController@detailStudent')->name('view.detail.student');
    // Edit
    Route::get('/admin/dashboard/table/list/student/{id}/edit', 'SiswaController@editStudent')->name('edit.student');
    Route::put('/admin/dashboard/table/list/student/{id}/update', 'SiswaController@updateStudent')->name('update.student');
    // Ganti Password
    Route::get('/admin/dashboard/table/list/student/{id}/edit/password', 'SiswaController@editPasswordStudent')->name('edit.password.student');
    Route::post('/admin/dashboard/table/list/student/{id}/update/password', 'SiswaController@updatePasswordStudent')->name('update.password.student');
    // Import Siswa
    Route::post('/admin/dashboard/add/student/import', 'SiswaController@importStudent');
    // Hapus Siswa
    Route::delete('/admin/dashboard/table/list/student/{id}/destroy', 'SiswaController@destroyStudent')->name('destroy.student');

    // Jurusan
    Route::get('/admin/dashboard/add/major', 'JurusanController@addMajor')->name('add.major');
    Route::post('/admin/getMajor', 'JurusanController@getMajor')->name('getMajor');
    Route::post('/admin/dashboard/add/major/store', 'JurusanController@postAddMajor');
    // Table
    Route::get('/admin/dashboard/table/list/major', 'JurusanController@tableMajor')->name('table.major.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/major/{id}/detail', 'JurusanController@detailMajor')->name('view.detail.major');
    // Edit
    Route::get('/admin/dashboard/table/list/major/{id}/edit', 'JurusanController@editMajor')->name('edit.major');
    Route::put('/admin/dashboard/table/list/major/{id}/update', 'JurusanController@updateMajor')->name('update.major');
    // Hapus Jurusan
    Route::delete('/admin/dashboard/table/list/major/{id}/destroy', 'JurusanController@destroyMajor')->name('destroy.major');


    // Kelas
    Route::get('/admin/dashboard/add/class', 'KelasController@addClass')->name('add.class');
    Route::post('/admin/dashboard/add/class/store', 'KelasController@postAddClass');
    // Table
    Route::get('/admin/dashboard/table/list/class', 'KelasController@tableClass')->name('table.class.list');
    // Edit Kelas
    Route::get('/admin/dashboard/table/list/class/{id}/edit', 'KelasController@editClass')->name('edit.class');
    Route::put('/admin/dashboard/table/list/class/{id}/update', 'KelasController@updateClass')->name('update.class');
    // Hapus Kelas
    Route::delete('/admin/dashboard/table/list/class/{id}/destroy', 'KelasController@destroyClass')->name('destroy.class');


    // Mapel
    Route::get('/admin/dashboard/add/lesson', 'MapelController@addLesson')->name('add.lesson');
    Route::post('/admin/dashboard/add/lesson/store', 'MapelController@postAddLesson');
    // Table
    Route::get('/admin/dashboard/table/list/lesson', 'MapelController@tablelesson')->name('table.lesson.list');
    // Edit Mapel
    Route::get('/admin/dashboard/table/list/lesson/{id}/edit', 'MapelController@editLesson')->name('edit.lesson');
    Route::put('/admin/dashboard/table/list/lesson/{id}/update', 'MapelController@updateLesson')->name('update.lesson');
    // Hapus Mapel
    Route::delete('/admin/dashboard/table/list/lesson/{id}/destroy', 'MapelController@destroyLesson')->name('destroy.lesson');


    // Info
    Route::get('/admin/dashboard/add/info', 'InformasiController@addInfo')->name('add.info');
    Route::post('/admin/dashboard/add/info/store', 'InformasiController@postAddInfo');
    // Table
    Route::get('/admin/dashboard/table/list/info', 'InformasiController@tableInfo')->name('table.info.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/info/{id}/detail', 'InformasiController@detailInfo')->name('view.detail.info');
    // Edit Informasi
    Route::get('/admin/dashboard/table/list/info/{id}/edit', 'InformasiController@editInfo')->name('edit.info');
    Route::put('/admin/dashboard/table/list/info/{id}/update', 'InformasiController@updateInfo')->name('update.info');
    // Hapus Informasi
    Route::delete('/admin/dashboard/table/list/info/{id}/destroy', 'InformasiController@destroyInfo')->name('destroy.info');

    // Jadwal
    Route::get('/admin/dashboard/add/jadwal', 'JadwalController@addJadwal')->name('add.jadwal');
    Route::post('/admin/dashboard/add/jadwal/store', 'JadwalController@postAddJadwal');
    // Table
    Route::get('/admin/dashboard/table/list/jadwal', 'JadwalController@tableJadwal')->name('table.jadwal.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/jadwal/{id}/edit', 'JadwalController@editJadwal')->name('edit.jadwal');
    Route::put('/admin/dashboard/table/list/jadwal/{id}/update', 'JadwalController@updateJadwal')->name('update.jadwal');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/jadwal/{id}/destroy', 'JadwalController@destroyJadwal')->name('destroy.jadwal');

    // Materi
    Route::get('/admin/dashboard/add/materi', 'MateriController@addMateri')->name('add.materi');
    Route::post('/admin/dashboard/add/materi/store', 'MateriController@postAddMateri');
     // View Detail
    Route::get('/admin/dashboard/table/list/materi/{id}/detail', 'MateriController@detailMateri')->name('view.detail.materi');
    // Table
    Route::get('/admin/dashboard/table/list/materi', 'MateriController@tableMateri')->name('table.materi.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/materi/{id}/edit', 'MateriController@editMateri')->name('edit.materi');
    Route::put('/admin/dashboard/table/list/materi/{id}/update', 'MateriController@updateMateri')->name('update.materi');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/materi/{id}/destroy', 'MateriController@destroyMateri')->name('destroy.materi');

    // rpp
    Route::get('/admin/dashboard/add/rpp', 'RppController@addRpp')->name('add.rpp');
    Route::post('/admin/dashboard/add/rpp/store', 'RppController@postAddRpp');
    // Table
    Route::get('/admin/dashboard/table/list/rpp', 'RppController@tableRpp')->name('table.rpp.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/rpp/{id}/edit', 'RppController@editRpp')->name('edit.rpp');
    Route::put('/admin/dashboard/table/list/rpp/{id}/update', 'RppController@updateRpp')->name('update.rpp');
     // View Detail
    Route::get('/admin/dashboard/table/list/rpp/{id}/detail', 'RppController@detailRpp')->name('view.detail.rpp');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/rpp/{id}/destroy', 'RppController@destroyRpp')->name('destroy.rpp');
    Route::get('/guru/getGuru/', 'RppController@getGuru')->name('rpp.getGuru');

    // rapot Multi
    Route::get('/admin/dashboard/table/list/nilai/multi/x', 'RapotController@tableNilaiMulti10')->name('table.nilai.list.multi10');
    Route::get('/admin/dashboard/table/list/nilai/multi/xi', 'RapotController@tableNilaiMulti11')->name('table.nilai.list.multi11');
    Route::get('/admin/dashboard/table/list/nilai/multi/xii', 'RapotController@tableNilaiMulti12')->name('table.nilai.list.multi12');
    // rapot Multi
    Route::get('/admin/dashboard/table/list/nilai/mutu/x', 'RapotController@tableNilaiMutu10')->name('table.nilai.list.mutu10');
    Route::get('/admin/dashboard/table/list/nilai/mutu/xi', 'RapotController@tableNilaiMutu11')->name('table.nilai.list.mutu11');
    Route::get('/admin/dashboard/table/list/nilai/mutu/xii', 'RapotController@tableNilaiMutu12')->name('table.nilai.list.mutu12');
    // Route::get('/admin/dashboard/add/rapot', 'RapotController@addRapot')->name('add.rapot');
    Route::post('/admin/dashboard/getstudent', 'NilaiController@getStudent')->name('getStudent');
    // Route::get('/admin/dashboard/nilai/{id}', 'NilaiController@kasihNilai')->name('kasih.nilai');
    // Route::post('/admin/dashboard/add/rapot/store', 'RapotController@postAddRapot')->name('post.tambah.rapot');
    // Table
    // // Edit Jadwal
    // Route::get('/admin/dashboard/table/list/rapot/{id}/edit', 'RapotController@editRapot')->name('edit.rapot');
    // Route::put('/admin/dashboard/table/list/rapot/{id}/update', 'RapotController@updateRapot')->name('update.rapot');
    //  // View Detail
    // Route::get('/admin/dashboard/table/list/rapot/{id}/detail', 'RapotController@detailRapot')->name('view.detail.rapot');
    // // Hapus Jadwal
    // Route::delete('/admin/dashboard/table/list/rapot/{id}/destroy', 'RapotController@destroyRapot')->name('destroy.rapot');

    // ekskul
    Route::get('/admin/dashboard/add/ekskul', 'EkskulController@addEkskul')->name('add.ekskul');
    Route::post('/admin/dashboard/add/ekskul/store', 'EkskulController@postAddEkskul');
    // Table
    Route::get('/admin/dashboard/table/list/ekskul', 'EkskulController@tableEkskul')->name('table.ekskul.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/ekskul/{id}/edit', 'EkskulController@editEkskul')->name('edit.ekskul');
    Route::put('/admin/dashboard/table/list/ekskul/{id}/update', 'EkskulController@updateEkskul')->name('update.ekskul');
     // View Detail
    Route::get('/admin/dashboard/table/list/ekskul/{id}/detail', 'EkskulController@detailEkskul')->name('view.detail.ekskul');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/ekskul/{id}/destroy', 'EkskulController@destroyEkskul')->name('destroy.ekskul');

    // cetak rapot
	Route::get('laporan/cetak-rapot/{id}', 'RapotController@cetakRapot')->name('cetak.rapot.id');

    // nilai 10 Multi
	Route::get('/admin/dashboard/add/nilai/multi/x', 'NilaiMulti10Controller@nilaiMulti10')->name('add.nilai.multi10');
	Route::post('/admin/dashboard/add/nilai/multi/x/store', 'NilaiMulti10Controller@postNilainilaiMulti10')->name('post.nilai.multi10');
	// Edit Nilai
	Route::get('/admin/dashboard/table/list/nilai/multi/x/{id}/edit', 'NilaiMulti10Controller@editNilai')->name('edit.nilai.multi10');
	Route::put('/admin/dashboard/table/list/nilai/multi/x/{id}/update', 'NilaiMulti10Controller@updateNilai')->name('update.nilai.multi10');
	// View Detail
	Route::get('/admin/dashboard/table/list/nilai/multi/x/{id}/detail', 'NilaiMulti10Controller@detailNilai')->name('view.detail.nilai.multi10');
    // Cetak
    Route::get('/admin/dashboard/table/list/nilai/multi/x/print/{id}', 'NilaiMulti10Controller@cetakRapotMulti10')->name('cetak.rapot.id.multi10');
	// Hapus
	Route::delete('/admin/dashboard/table/list/nilai/multi/x/{id}/destroy', 'NilaiMulti10Controller@destroyNilai')->name('destroy.nilai.multi10');

    // nilai 11 Multi
	Route::get('/admin/dashboard/add/nilai/multi/xi', 'NilaiMulti11Controller@nilaiMulti11')->name('add.nilai.multi11');
	Route::post('/admin/dashboard/add/nilai/multi/xi/store', 'NilaiMulti11Controller@postNilainilaiMulti11')->name('post.nilai.multi11');
	// Edit Nilai
	Route::get('/admin/dashboard/table/list/nilai/multi/xi/{id}/edit', 'NilaiMulti11Controller@editNilai')->name('edit.nilai.multi11');
	Route::put('/admin/dashboard/table/list/nilai/multi/xi/{id}/update', 'NilaiMulti11Controller@updateNilai')->name('update.nilai.multi11');
	// View Detail
	Route::get('/admin/dashboard/table/list/nilai/multi/xi/{id}/detail', 'NilaiMulti11Controller@detailNilai')->name('view.detail.nilai.multi11');
    // Cetak
    Route::get('/admin/dashboard/table/list/nilai/multi/xi/print/{id}', 'NilaiMulti11Controller@cetakRapotMulti11')->name('cetak.rapot.id.multi11');
	// Hapus
	Route::delete('/admin/dashboard/table/list/nilai/multi/xi/{id}/destroy', 'NilaiMulti11Controller@destroyNilai')->name('destroy.nilai.multi11');

    // nilai 12 Multi
	Route::get('/admin/dashboard/add/nilai/multi/xii', 'NilaiMulti12Controller@nilaiMulti12')->name('add.nilai.multi12');
	Route::post('/admin/dashboard/add/nilai/multi/xii/store', 'NilaiMulti12Controller@postNilainilaiMulti12')->name('post.nilai.multi12');
	// Edit Nilai
	Route::get('/admin/dashboard/table/list/nilai/multi/xii/{id}/edit', 'NilaiMulti12Controller@editNilai')->name('edit.nilai.multi12');
	Route::put('/admin/dashboard/table/list/nilai/multi/xii/{id}/update', 'NilaiMulti12Controller@updateNilai')->name('update.nilai.multi12');
	// View Detail
	Route::get('/admin/dashboard/table/list/nilai/multi/xii/{id}/detail', 'NilaiMulti12Controller@detailNilai')->name('view.detail.nilai.multi12');
    // Cetak
    Route::get('/admin/dashboard/table/list/nilai/multi/xii/print/{id}', 'NilaiMulti12Controller@cetakRapotMulti12')->name('cetak.rapot.id.multi12');
	// Hapus
	Route::delete('/admin/dashboard/table/list/nilai/multi/xii/{id}/destroy', 'NilaiMulti12Controller@destroyNilai')->name('destroy.nilai.multi12');


    // nilai 10 Mutu
	Route::get('/admin/dashboard/add/nilai/mutu/x', 'NilaiMutu10Controller@nilaimutu10')->name('add.nilai.mutu10');
	Route::post('/admin/dashboard/add/nilai/mutu/x/store', 'NilaiMutu10Controller@postNilainilaimutu10')->name('post.nilai.mutu10');
	// Edit Nilai
	Route::get('/admin/dashboard/table/list/nilai/mutu/x/{id}/edit', 'NilaiMutu10Controller@editNilai')->name('edit.nilai.mutu10');
	Route::put('/admin/dashboard/table/list/nilai/mutu/x/{id}/update', 'NilaiMutu10Controller@updateNilai')->name('update.nilai.mutu10');
	// View Detail
	Route::get('/admin/dashboard/table/list/nilai/mutu/x/{id}/detail', 'NilaiMutu10Controller@detailNilai')->name('view.detail.nilai.mutu10');
    // Cetak
    Route::get('/admin/dashboard/table/list/nilai/mutu/x/print/{id}', 'NilaiMutu10Controller@cetakRapotmutu10')->name('cetak.rapot.id.mutu10');
	// Hapus
	Route::delete('/admin/dashboard/table/list/nilai/mutu/x/{id}/destroy', 'NilaiMutu10Controller@destroyNilai')->name('destroy.nilai.mutu10');


    // nilai 11 mutu
    Route::post('/admin/dashboard/getmapel/mutu/{id_kelas}', 'NilaiMutu11Controller@getMapelMutu11')->name('getMapelMutu11');
    Route::post('/admin/dashboard/add/nilai/mutu/xi', 'NilaiMutu11Controller@storeMutu11')->name('store.nilai.mutu11');

	Route::get('/admin/dashboard/add/nilai/mutu/xi', 'NilaiMutu11Controller@nilaimutu11')->name('add.nilai.mutu11');
	Route::post('/admin/dashboard/add/nilai/mutu/xi/store', 'NilaiMutu11Controller@postNilainilaimutu11')->name('post.nilai.mutu11');
	// Edit Nilai
	Route::get('/admin/dashboard/table/list/nilai/mutu/xi/{id}/edit', 'NilaiMutu11Controller@editNilai')->name('edit.nilai.mutu11');
	Route::put('/admin/dashboard/table/list/nilai/mutu/xi/{id}/update', 'NilaiMutu11Controller@updateNilai')->name('update.nilai.mutu11');
	// View Detail
	Route::get('/admin/dashboard/table/list/nilai/mutu/xi/{id}/detail', 'NilaiMutu11Controller@detailNilai')->name('view.detail.nilai.mutu11');
    // Cetak
    Route::get('/admin/dashboard/table/list/nilai/mutu/xi/print/{id}', 'NilaiMutu11Controller@cetakRapotmutu11')->name('cetak.rapot.id.mutu11');
	// Hapus
	Route::delete('/admin/dashboard/table/list/nilai/mutu/xi/{id}/destroy', 'NilaiMutu11Controller@destroyNilai')->name('destroy.nilai.mutu11');

    // nilai 12 mutu
	Route::get('/admin/dashboard/add/nilai/mutu/xii', 'NilaiMutu12Controller@nilaimutu12')->name('add.nilai.mutu12');
	Route::post('/admin/dashboard/add/nilai/mutu/xii/store', 'NilaiMutu12Controller@postNilainilaimutu12')->name('post.nilai.mutu12');
	// Edit Nilai
	Route::get('/admin/dashboard/table/list/nilai/mutu/xii/{id}/edit', 'NilaiMutu12Controller@editNilai')->name('edit.nilai.mutu12');
	Route::put('/admin/dashboard/table/list/nilai/mutu/xii/{id}/update', 'NilaiMutu12Controller@updateNilai')->name('update.nilai.mutu12');
	// View Detail
	Route::get('/admin/dashboard/table/list/nilai/mutu/xii/{id}/detail', 'NilaiMutu12Controller@detailNilai')->name('view.detail.nilai.mutu12');
    // Cetak
    Route::get('/admin/dashboard/table/list/nilai/mutu/xii/print/{id}', 'NilaiMutu12Controller@cetakRapotmutu12')->name('cetak.rapot.id.mutu12');
	// Hapus
	Route::delete('/admin/dashboard/table/list/nilai/mutu/xii/{id}/destroy', 'NilaiMutu12Controller@destroyNilai')->name('destroy.nilai.mutu12');

    Route::get('/info/{id}', 'MateriController@getInfo');
});
