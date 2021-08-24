@extends('layouts.master')

@section('title')
    Dashboard | Tambah Data Raport Siswa
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Rapot</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/rapot/store" method="POST" enctype="multipart/form-data">
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
                                <label for="siswa">Nama Siswa <span class="text-danger">*</span></label>
                                    <select name="siswa" id="siswa" class="form-control" required>
                                        <option value="" disabled selected>Pilih Nama Siswa</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </select>
                                @error('siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('siswa') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                    <select name="kelas" id="kelas" class="form-control" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->kelas }}">{{ $item->kelas }}</option>
                                        @endforeach
                                    </select>
                                </select>
                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelas') }}</strong>
                                    </span>
                                @enderror
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
                                <label for="mitra_pkl"> Mitra Pkl <span class="text-danger">*</span></label>
                                    <input type="text" name="mitra_pkl" id="mitra_pkl" class="form-control" required>
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
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" required>
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
                                <label for="lama_pkl"> Lama Pkl <span class="text-danger">*</span></label>
                                    <input type="text" name="lama_pkl" id="lama_pkl" class="form-control" required>
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
                                <label for="keterangan"> Keterangan <span class="text-danger">*</span></label>
                                    <input type="text" name="keterangan" id="catatan" class="form-control" required>
                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
