@extends('layouts.master')

@section('title')
    Dashboard | Home Admin
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Edit Nilai</h3>
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
                                    <select name="nis" id="nis" class="form-control" required>
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
                        
                        

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">PAI <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="ppai" id="ppai" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('ppai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ppai') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kpai" id="kpai" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kpai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kpai') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>  

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">PKN <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="ppkn" id="ppkn" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('ppkn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ppkn') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kpkn" id="kpkn" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kpkn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kpkn') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>      

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Indonesia <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="pindonesia" id="pindonesia" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('pindonesia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pindonesia') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kindonesia" id="kindonesia" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kindonesia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kindonesia') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">MTK <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="pmtk" id="pmtk" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('pmtk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pmtk') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kmtk" id="kmtk" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kmtk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kmtk') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Sejarah <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="psejarah" id="psejarah" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('psejarah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('psejarah') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="ksejarah" id="ksejarah" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('ksejarah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ksejarah') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Inggris <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="pinggris" id="pinggris" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('pinggris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pinggris') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kinggris" id="kinggris" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kinggris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kinggris') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">SBK <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="psbk" id="psbk" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('psbk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('psbk') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="ksbk" id="ksbk" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('ksbk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ksbk') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">PJOK <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="ppjok" id="ppjok" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('ppjok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ppjok') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kpjok" id="kpjok" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kpjok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kpjok') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Sunda <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="psunda" id="psunda" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('psunda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('psunda') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="ksunda" id="ksunda" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('ksunda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ksunda') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Simdig <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="psimdig" id="psimdig" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('psimdig')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('psimdig') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="ksimdig" id="ksimdig" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('ksimdig')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ksimdig') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Fisika <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="pfisika" id="pfisika" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('pfisika')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pfisika') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kfisika" id="kfisika" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kfisika')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kfisika') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Kimia <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="pkimia" id="pkimia" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('pkimia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pkimia') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kkimia" id="kkimia" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kkimia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kkimia') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Design <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="pdesign" id="pdesign" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('pdesign')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pdesign') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kdesign" id="kdesign" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kdesign')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kdesign') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Komputer <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="pkomputer" id="pkomputer" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('pkomputer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pkomputer') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kkomputer" id="kkomputer" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kkomputer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kkomputer') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Pemograman <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="ppemograman" id="ppemograman" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                    @error('ppemograman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ppemograman') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" name="kpemograman" id="kpemograman" class="form-control" required placeholder="Input Nilai Keterampilan">
                                    @error('kpemograman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kpemograman') }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Catatan Akademik <span class="text-danger">*</span></label>
                                    <input type="text" name="akademik" id="akademik" class="form-control" required>
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
                                <label for="integritas">Integritas<span class="text-danger">*</span></label>
                                    <input type="text" name="integritas" id="integritas" class="form-control" required>
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
                                    <input type="text" name="religius" id="religius" class="form-control" required>
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
                                    <input type="text" name="nasionalis" id="nasionalis" class="form-control" required>
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
                                    <input type="text" name="mandiri" id="mandiri" class="form-control" required>
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
                                    <input type="text" name="gotong_royong" id="gotong_royong" class="form-control" required>
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
                                <label for="catatan"> Catatan <span class="text-danger">*</span></label>
                                    <input type="text" name="catatan" id="catatan" class="form-control" required>
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
                                <label for="mitra_pkl"> Mitra Pkl </label>
                                    <input type="text" name="mitra_pkl" id="mitra_pkl" class="form-control" >
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
                                <label for="lokasi"> Lokasi </span></label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" >
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
                                <label for="lama_pkl"> Lama Pkl </label>
                                    <input type="text" name="lama_pkl" id="lama_pkl" class="form-control" >
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
                                <label for="keterangan"> Keterangan </label>
                                    <input type="text" name="keterangan" id="catatan" class="form-control" >
                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ekskul">Ekstrakulikuler </label>
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
                                <label for="ekskul"> Ket Ekstrakulikuler </label>
                                    <input type="text" name="keterangan_ekskul" id="catatan" class="form-control" >
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
</select>
@endsection
