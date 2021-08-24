@extends('layouts.master')

@section('title')
    Dashboard | Edit Nilai
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Edit Nilai Siswa</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.nilai.mutu10', $nilai->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS <span class="text-danger">*</span></label>
                                {{-- <input type="text" name="nis" id="nis" class="form-control" required> --}}
                                    <select name="nis" id="nis" class="js-example-basic-single form-control" required>
                                        <option value="{{ $nilai->nis }}" selected>{{ $nilai->siswa->nis }}</option>
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
                                    <option value="{{ $nilai->siswa_id }}" selected>{{ $nilai->siswa->nama }}</option>
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
                                    <option value="{{ $nilai->kelas_id }}" selected>{{ $nilai->kelas->kelas }}</option>
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

                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Matematika <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pmtk" id="pmtk" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('pmtk') ?? $nilai->pmtk }}">
                                    @error('pmtk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pmtk') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kmtk" id="kmtk" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kmtk') ?? $nilai->kmtk }}">
                                    @error('kmtk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kmtk') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Pendidikan Agama dan Budi Pekerti <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="ppai" id="ppai" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{old('ppai') ?? $nilai->ppai}}">
                                    @error('ppai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ppai') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kpai" id="kpai" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{old('kpai') ?? $nilai->kpai}}">
                                    @error('kpai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kpai') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Bahasa Indonesia <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pindonesia" id="pindonesia" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('pindonesia') ?? $nilai->pindonesia }}">
                                    @error('pindonesia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pindonesia') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kindonesia" id="kindonesia" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kindonesia') ?? $nilai->kindonesia }}">
                                    @error('kindonesia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kindonesia') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Pendidikan Pancasila dan Kewarganegaraan <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="ppkn" id="ppkn" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('ppkn') ?? $nilai->ppkn }}">
                                    @error('ppkn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ppkn') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kpkn" id="kpkn" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kpkn') ?? $nilai->kpkn }}">
                                    @error('kpkn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kpkn') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Bahasa Inggris dan Bahasa Asing Lainnya <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pinggris" id="pinggris" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('pinggris') ?? $nilai->pinggris }}">
                                    @error('pinggris')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pinggris') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kinggris" id="kinggris" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kinggris') ?? $nilai->kinggris }}">
                                    @error('kinggris')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kinggris') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Kimia <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pkimia" id="pkimia" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('pkimia') ?? $nilai->pkimia}}">
                                    @error('pkimia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pkimia') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kkimia" id="kkimia" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kkimia') ?? $nilai->kkimia}}">
                                    @error('kkimia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kkimia') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Fisika <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pfisika" id="pfisika" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('pfisika') ?? $nilai->pfisika }}">
                                    @error('pfisika')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pfisika') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kfisika" id="kfisika" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kfisika') ?? $nilai->kfisika }}">
                                    @error('kfisika')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kfisika') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Bahasa Sunda <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="psunda" id="psunda" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('psunda') ?? $nilai->psunda }}">
                                    @error('psunda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('psunda') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="ksunda" id="ksunda" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('ksunda') ?? $nilai->ksunda }}">
                                    @error('ksunda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ksunda') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Sejarah Indonesia <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="psejarah" id="psejarah" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('psejarah') ?? $nilai->psejarah }}">
                                    @error('psejarah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('psejarah') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="ksejarah" id="ksejarah" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('ksejarah') ?? $nilai->ksejarah }}">
                                    @error('ksejarah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ksejarah') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Seni Budaya <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="psbk" id="psbk" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('psbk') ?? $nilai->psbk }}">
                                    @error('psbk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('psbk') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="ksbk" id="ksbk" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('ksbk') ?? $nilai->ksbk }}">
                                    @error('ksbk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ksbk') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Simulasi Digital <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="psimdig" id="psimdig" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('psimdig') ?? $nilai->psimdig }}">
                                    @error('psimdig')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('psimdig') }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="ksimdig" id="ksimdig" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('ksimdig') ?? $nilai->ksimdig }}">
                                    @error('ksimdig')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ksimdig') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Biologi <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="pbiologi" id="pbiologi" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('pbiologi') ?? $nilai->pbiologi }}">
                                    @error('pbiologi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pbiologi') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kbiologi" id="kbiologi" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kbiologi') ?? $nilai->kbiologi }}">
                                    @error('kbiologi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kbiologi') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Dasar Penanganan Bahan Hasil Pertanian <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="ppenanganan" id="ppenanganan" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('ppenanganan') ?? $nilai->ppenanganan }}">
                                    @error('ppenanganan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ppenanganan') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kpenanganan" id="kpenanganan" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kpenanganan') ?? $nilai->kpenanganan }}">
                                    @error('kpenanganan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kpenanganan') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Dasar Proses Pengolahan Hasil <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="ppengolahan" id="ppengolahan" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('ppengolahan') ?? $nilai->ppengolahan }}">
                                    @error('ppengolahan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ppengolahan') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kpengolahan" id="kpengolahan" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kpengolahan') ?? $nilai->kpengolahan }}">
                                    @error('kpengolahan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kpengolahan') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Pertanian <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="ppertanian" id="ppertanian" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('ppertanian') ?? $nilai->ppertanian }}">
                                    @error('ppertanian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ppertanian') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kpertanian" id="kpertanian" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kpertanian') ?? $nilai->kpertanian }}">
                                    @error('kpertanian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kpertanian') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mapel">Dasar Pengendalian Mutu Hasil Pertanian <span class="text-danger">*</span></label>
                                <div class="col-md-12 px-0">
                                    <input type="number" name="ppengendalian" id="ppengendalian" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ old('ppengendalian') ?? $nilai->ppengendalian }}">
                                    @error('ppengendalian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ppengendalian') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 px-0 mt-2">
                                    <input type="number" name="kpengendalian" id="kpengendalian" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ old('kpengendalian') ?? $nilai->kpengendalian }}">
                                    @error('kpengendalian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kpengendalian') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Catatan Akademik <span class="text-danger">*</span></label>
                                <input type="text" name="akademik" id="akademik" class="form-control" required value="{{ old('akademik') ?? $nilai->akademik }}">
                                @error('akademik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('akademik') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="integritas">Integritas<span class="text-danger">*</span></label>
                                <input type="text" name="integritas" id="integritas" class="form-control" required value="{{ old('integritas') ?? $nilai->integritas }}">
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
                                <input type="text" name="religius" id="religius" class="form-control" required value="{{ old('religius') ?? $nilai->religius }}">
                                @error('religius')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('religius') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nasionalis">Nasionalis <span class="text-danger">*</span></label>
                                <input type="text" name="nasionalis" id="nasionalis" class="form-control" required value="{{ old('nasionalis') ?? $nilai->nasionalis }}">
                                @error('nasionalis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nasionalis') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mandiri">Mandiri <span class="text-danger">*</span></label>
                                <input type="text" name="mandiri" id="mandiri" class="form-control" required value="{{ old('mandiri') ?? $nilai->mandiri }}">
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
                                <input type="text" name="gotong_royong" id="gotong_royong" class="form-control" required value="{{ old('gotong_royong') ?? $nilai->gotong_royong }}">
                                @error('gotong_royong')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gotong_royong') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="catatan"> Catatan</label>
                                <input type="text" name="catatan" id="catatan" class="form-control" value="{{ old('catatan') ?? $nilai->catatan }}">
                                @error('catatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('catatan') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ekskul">Ekstrakulikuler</label>
                                <select name="ekskul" id="ekskul" class="js-example-basic-single form-control" value="{{ old('ekskul') ?? $nilai->ekskul }}" >
                                <option value="" disabled>Pilih Ekstrakulikuler</option>
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
                                <label for="keterangan_ekskul">Ket Ekstrakulikuler</label>
                                <input type="text" name="keterangan_ekskul" id="keterangan_ekskul" class="form-control" value="{{ old('keterangan_ekskul') ?? $nilai->keterangan_ekskul }}">
                                @error('keterangan_ekskul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('keterangan_ekskul') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
