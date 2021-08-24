@extends('layouts.master')

@section('title')
    Dashboard | Tambah Data Nilai Siswa
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    @section('content')
<div class="col-12">
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
</div>

<a href="{{ url('/admin/dashboard/home') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Nilai</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/nilai/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS <span class="text-danger">*</span></label>
                                {{-- <input type="text" name="nis" id="nis" class="form-control" required> --}}
                                    <select name="nis" id="nis" class="js-example-basic-single form-control" required>
                                        <option value="" disabled selected>Pilih NIS</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->nis }}">{{ $item->nis }}</option>
                                        @endforeach
                                    </select>
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="siswa_id">Nama <span class="text-danger">*</span></label>
                                {{-- <input type="text" name="siswa_id" id="siswa_id" class="form-control" readonly required> --}}
                                <select name="siswa_id" id="siswa_id" class="js-example-basic-single form-control" value="{{ old('siswa_id') }}" required>
                                    <option value="" disabled selected>Pilih Nama Siswa</option>
                                    @foreach ($siswa as $siswas)
                                        <option value="{{ $siswas->id }}">{{ $siswas->nama }}</option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('siswa_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas_id">Kelas <span class="text-danger">*</span></label>
                                {{-- <input type="text" name="kelas_id" id="kelas_id" class="form-control" value="{{ old('kelas_id') }}" required> --}}
                                <select name="kelas_id" id="kelas_id" class="js-example-basic-single form-control" value="{{ old('kelas_id') }}" required>
                                    <option value="" disabled selected>Pilih Kelas Siswa</option>
                                    @foreach ($kelas as $kelass)
                                        <option value="{{ $kelass->id }}">{{ $kelass->kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelas_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="container-inputnilai" class="row  my-4">

                    </div>
                    <hr>
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Catatan Akademik <span class="text-danger">*</span></label>
                                    <input type="text" name="akademik" id="akademik" class="form-control" required>
                                    @error('akademik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('akademik') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="integritas">Integritas<span class="text-danger">*</span></label>
                                    <input type="text" name="integritas" id="integritas" class="form-control" required>
                                    @error('integritas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('integritas') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religius">Religius <span class="text-danger">*</span></label>
                                    <input type="text" name="religius" id="religius" class="form-control" required>
                                    @error('religius')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('religius') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nasionalis">Nasionalis <span class="text-danger">*</span></label>
                                    <input type="text" name="nasionalis" id="nasionalis" class="form-control" required>
                                    @error('nasionalis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nasionalis') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mandiri">Mandiri <span class="text-danger">*</span></label>
                                    <input type="text" name="mandiri" id="mandiri" class="form-control" required>
                                    @error('mandiri')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mandiri') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gotong_royong">Gotong Royong <span class="text-danger">*</span></label>
                                    <input type="text" name="gotong_royong" id="gotong_royong" class="form-control" required>
                                    @error('gotong_royong')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gotong_royong') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="catatan"> Catatan</label>
                                    <input type="text" name="catatan" id="catatan" class="form-control" >
                                    @error('catatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('catatan') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                    </div>
                    <hr>

                    <!--
                    <div class="row my-4">
                        <div class="col-md-12 mb-2">
                            <h5>Khusus Untuk Kompetensi Keahlian Pengawasan Mutu Hasil Pertanian dengan kode Kelas <b>(A1 - A2)</b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Jasa Pengujian Hasil Pertanian <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan1" class="form-control" required placeholder="Input Nilai Pengetahuan">

                                    @error('pjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan1"  class="form-control" required placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-4">
                        <div class="col-md-12 mb-2">
                            <h5>Khusus Untuk Kompetensi Keahlian Agribisnis Hasil Pertanian dan Perikanan dengan kode Kelas <b>(A3 - A8)</b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Bogasari Backing Center (IGI) <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan1" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan1"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-4">
                        <div class="col-md-12 mb-2">
                            <h5>Khusus Untuk Kompetensi Keahlian Agribisnis Tanaman Pangan dan Holtikultura dengan kode Kelas <b>(B1 - B4)</b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Kultur Jaringan <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan1" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan1"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Hiidroponik <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan2" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan2"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-4">
                        <div class="col-md-12 mb-2">
                            <h5>Khusus Untuk Kompetensi Keahlian Agribisnis Ternak Ruminansia dengan kode Kelas <b>(C1)</b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Budidaya Sapi <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan1" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan1"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Budidaya Kambing <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan2" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan2"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-4">
                        <div class="col-md-12 mb-2">
                            <h5>Khusus Untuk Kompetensi Keahlian Agribisnis Ternak Unggas dengan kode Kelas <b>(C2 - C3)</b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Budidaya Ternak Unggas <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan1" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan1"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telur Unggas<span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan2" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan2"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-4">
                        <div class="col-md-12 mb-2">
                            <h5>Khusus Untuk Kompetensi Keahlian Agribisnis Perikanan dengan kode Kelas <b>(D1 - D3)</b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Produksi benih ikan lele dumbo (Clarias gariepinus) <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan1" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan1"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-4">
                        <div class="col-md-12 mb-2">
                            <h5>Khusus Untuk Kompetensi Keahlian Multimedia dengan kode Kelas <b>(E1 - E2)</b></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" >Animasi 2d/3d <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan1" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan1"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan1') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Desain Grafis Percetakan <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan2" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan2"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan2') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Teknik Pengolahan Audio Video <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pjurusan3" class="form-control"  placeholder="Input Nilai Pengetahuan">
                                    <small class="text-muted">Nilai Pengetahuan</small>
                                    @error('pjurusan3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pjurusan3') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjurusan3"  class="form-control"  placeholder="Input Nilai Keterampilan">
                                    <small class="text-muted">Nilai Keterampilan</small>
                                    @error('kjurusan3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kjurusan3') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mitra_pkl"> Mitra Pkl</label>
                                    <input type="text" name="mitra_pkl" id="mitra_pkl" class="form-control" >
                                    @error('mitra_pkl')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mitra_pkl') }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokasi"> Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" >
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lokasi') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lama_pkl"> Lama Pkl</label>
                                    <input type="text" name="lama_pkl" id="lama_pkl" class="form-control" >
                                    @error('lama_pkl')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lama_pkl') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan"> Keterangan</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control" >
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keterangan') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ekskul">Ekstrakulikuler</label>
                                <select name="ekskul" id="ekskul" class="js-example-basic-single form-control" value="{{ old('ekskul') }}" >
                                    <option value="" disabled selected>Pilih Ekskul Siswa</option>
                                    @foreach ($ekskul as $eks)
                                        <option value="{{ $eks->nama }}">{{ $eks->nama }}</option>
                                    @endforeach
                                </select>
                                @error('ekskul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ekskul') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan_ekskul"> Ket Ekstrakulikuler</label>
                                    <input type="text" name="keterangan_ekskul" id="keterangan_ekskul" class="form-control">
                                        @error('keterangan_ekskul')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keterangan_ekskul') }}</strong>
                                            </span>
                                        @enderror

                            </div>
                        </div>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function(){
            $("#nis" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                            url:"getStudent",
                            type: 'post',
                            dataType: "json",
                            data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                            success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#nis').val(ui.item.label); // display the selected text
                    $('#siswa_id').val(ui.item.value); // save selected id to input

                    return false;
                }
            });
        });
    </script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function (e) {
            $('#kelas_id').on('change', function () {
                const kelas_id = $(this).val();
                $.ajax(
                    {
                        url: "/admin/dashboard/getmapel/" + kelas_id,
                        type: 'post',
                        dataType: "json",
                        data: {
                        _token: CSRF_TOKEN,
                    },
                    success: function (data) {
                        // Clear #container-inputnilai terlebih dahulu
                        $("#container-inputnilai").empty();

                        data.forEach(function(d) {
                            const input = `<div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">${d.mata_pelajaran} <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="hidden" name="id[]" value="${d.id}">
                                        <input type="hidden" name="mapeltype[]" value="${d.mapeltype}">
                                        <input type="number" name="nilai[]" class="form-control" required placeholder="Input Nilai ${d.mapeltype == 0 ? 'Keterampilan' : 'Pengetahuan'}">
                                        <small class="text-muted">Nilai ${d.mapeltype == 0 ? 'Keterampilan' : 'Pengetahuan'}</small>
                                    </div>
                                </div>
                            </div>`;


                            // Memasukkan input ke container-inputnilai
                            $("#container-inputnilai").append(input);
                        });
                    }
                });
            });
        });
    </script>

    {{-- <script>
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function(){
            $("#kelas_id" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                            url:"{{route('getMapel')}}",
                            type: 'post',
                            dataType: "json",
                            data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                            success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#kelas_id').val(ui.item.label);
                    $('.mapel').val(ui.item.value);

                    return false;
                }
            });
        });
    </script> --}}
@endpush
