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
                <form action="{{ route('update.nilai', $nilai->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS <span class="text-danger">*</span></label>
                                    <select name="nis" id="nis" class="js-example-basic-single form-control" required>
                                        <option value="{{ $nilai->nis }}">{{ $nilai->nis }}</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->nis }}">{{ $item->nis }}</option>
                                        @endforeach
                                    </select>
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
                                <label for="siswa">Nama Siswa <span class="text-danger">*</span></label>
                                    <select name="siswa_id" id="siswa" class="js-example-basic-single form-control" required>
                                        <option value="{{ old('siswa') ?? $nilai->siswa_id }}">{{ old('siswa') ?? $nilai->siswa->nama }}</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
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
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                    <select name="kelas_id" id="kelas" class="js-example-basic-single form-control" required>
                                        <option value="{{ old('kelas_id') ?? $nilai->kelas_id }}">{{ old('kelas_id') ?? $nilai->kelas->kelas }}</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                        @endforeach
                                    </select>
                                </select>
                                @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelas_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="mapel">Bahasa Indonesia <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="pindonesia" id="pindonesia" class="form-control" required placeholder="Input Nilai Pengetahuan"  value="{{ $nilai->pindonesia }}">
                                                
                                                @error('pindonesia')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pindonesia') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="kindonesia" id="kindonesia" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kindonesia }}">
                                                
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
                                        <label for="" class="mapel">Pendidikan Agama dan Budi Pekerti <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="ppai" id="ppai" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->ppai }}">
                                                
                                                @error('ppai')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ppai') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="kpai" id="kpai" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kpai }}">
                                                
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
                                <label for="" class="mapel">Pendidikan Pancasila dan Kewarganegaraan <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="ppkn" id="ppkn" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->ppkn }}">
                                                
                                        @error('ppkn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ppkn') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kpkn" id="kpkn" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kpkn }}">
                                                
                                        @error('kpkn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kpkn') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="mapel">Matematika <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="pmtk" id="pmtk" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->pmtk }}">
                                                
                                                @error('pmtk')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pmtk') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="kmtk" id="kmtk" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kmtk }}">
                                                
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
                                        <label for="" class="mapel">Sejarah Indonesia <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="psejarah" id="psejarah" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->psejarah }}">
                                                
                                                @error('psejarah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('psejarah') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="ksejarah" id="ksejarah" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->ksejarah }}">
                                                
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
                                        <label for="" class="mapel">Bahasa Inggris dan Bahasa Asing Lainnya <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="pinggris" id="pinggris" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->pinggris }}">
                                                
                                                @error('pinggris')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pinggris') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="kinggris" id="kinggris" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kinggris }}">
                                                
                                                @error('kinggris')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('kinggris') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                    </div>
                                </div>
                    </div>
                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="mapel">Seni Budaya <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="psbk" id="psbk" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->psbk }}">
                                                
                                                @error('psbk')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('psbk') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="ksbk" id="ksbk" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->ksbk }}">
                                                
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
                                        <label for="" class="mapel">Pendidikan Jasmani, Olahraga & Kesehatan <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="ppjok" id="ppjok" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->ppjok }}">
                                                
                                                @error('ppjok')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ppjok') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="kpjok" id="kpjok" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kpjok }}">
                                                
                                                @error('kpjok')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('kpjok') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="mapel">Bahasa Sunda <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="psunda" id="psunda" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->psunda }}">
                                                
                                                @error('psunda')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('psunda') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="ksunda" id="ksunda" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->ksunda }}">
                                                
                                                @error('ksunda')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ksunda') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                    </div>
                                </div>
                    </div>
                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="mapel">Simulasi dan Komunikasi Digital <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="psimdig" id="psimdig" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->psimdig }}">
                                                
                                                @error('psimdig')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('psimdig') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="ksimdig" id="ksimdig" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->ksimdig }}">
                                                
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
                                        <label for="" class="mapel">Fisika <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="pfisika" id="pfisika" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->pfisika }}">
                                                
                                                @error('pfisika')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pfisika') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="kfisika" id="kfisika" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kfisika }}">
                                                
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
                                        <label for="" class="mapel">Kimia <span class="text-danger">*</span></label>
                                            <div class="col-md-12 px-0">
                                                <input type="number" name="pkimia" id="pkimia" class="form-control" required placeholder="Input Nilai Pengetahuan" value="{{ $nilai->pkimia }}">
                                                
                                                @error('pkimia')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pkimia') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 px-0 mt-2">
                                                <input type="number" name="kkimia" id="kkimia" class="form-control" required placeholder="Input Nilai Keterampilan" value="{{ $nilai->kkimia }}">
                                                
                                                @error('kkimia')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('kkimia') }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                    </div>
                                </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Akademik <span class="text-danger">*</span></label>
                                    <input type="text" name="akademik" id="akademik" class="form-control" required @error('akademik') is-invalid @enderror value="{{ old('akademik') ?? $nilai->akademik }}" id="akademik">
                                    @error('akademik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('akademik') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="integritas">Integritas <span class="text-danger">*</span></label>
                                    <input type="text" name="integritas" id="integritas" class="form-control" required @error('integritas') is-invalid @enderror value="{{ old('integritas') ?? $nilai->integritas }}" id="integritas">
                                    @error('integritas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('integritas') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religius">Religius <span class="text-danger">*</span></label>
                                    <input type="text" name="religius" id="religius" class="form-control" required @error('religius') is-invalid @enderror value="{{ old('religius') ?? $nilai->religius }}" id="religius">
                                    @error('religius')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('religius') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nasionalis">Nasionalis <span class="text-danger">*</span></label>
                                    <input type="text" name="nasionalis" id="nasionalis" class="form-control" required @error('nasionalis') is-invalid @enderror value="{{ old('nasionalis') ?? $nilai->nasionalis }}" id="nasionalis">
                                    @error('nasionalis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nasionalis') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mandiri">Mandiri <span class="text-danger">*</span></label>
                                    <input type="text" name="mandiri" id="mandiri" class="form-control" required @error('mandiri') is-invalid @enderror value="{{ old('mandiri') ?? $nilai->mandiri }}" id="mandiri">
                                    @error('mandiri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mandiri') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gotong_royong">Gotong Royong <span class="text-danger">*</span></label>
                                    <input type="text" name="gotong_royong" id="gotong_royong" class="form-control" required @error('gotong_royong') is-invalid @enderror value="{{ old('gotong_royong') ?? $nilai->gotong_royong }}" id="gotong_royong">
                                    @error('gotong_royong')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gotong_royong') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="catatan">Catatan <span class="text-danger">*</span></label>
                                    <input type="text" name="catatan" id="catatan" class="form-control" required @error('catatan') is-invalid @enderror value="{{ old('catatan') ?? $nilai->catatan }}" id="catatan">
                                    @error('catatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('catatan') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mitra_pkl">Mitra PKL <span class="text-danger">*</span></label>
                                    <input type="text" name="mitra_pkl" id="mitra_pkl" class="form-control" required @error('mitra_pkl') is-invalid @enderror value="{{ old('mitra_pkl') ?? $nilai->mitra_pkl }}" id="mitra_pkl">
                                    @error('mitra_pkl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mitra_pkl') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokasi"> Lokasi <span class="text-danger">*</span></label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" required @error('lokasi') is-invalid @enderror value="{{ old('lokasi') ?? $nilai->lokasi }}" id="lokasi">
                                    @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lokasi') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lama_pkl">Lama PKL <span class="text-danger">*</span></label>
                                    <input type="text" name="lama_pkl" id="lama_pkl" class="form-control" required @error('lama_pkl') is-invalid @enderror value="{{ old('lama_pkl') ?? $nilai->lama_pkl }}" id="lama_pkl">
                                    @error('lama_pkl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lama_pkl') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control" required @error('keterangan') is-invalid @enderror value="{{ old('keterangan') ?? $nilai->keterangan }}" id="keterangan">
                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </div>
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
