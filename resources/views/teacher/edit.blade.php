@extends('layouts.master')

@section('title')
    Dashboard | Edit Data Guru
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

<a href="{{ route('table.teacher.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Edit Data Guru</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.teacher', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') ?? $teacher->nik }}" id="nik" placeholder="Input NIK">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') ?? $teacher->nip }}" id="nip" placeholder="Input NIP">
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nuptk">NUPTK</label>
                                <input name="nuptk" type="text" class="form-control @error('nuptk') is-invalid @enderror" value="{{ old('nuptk') ?? $teacher->nuptk }}" id="nuptk" placeholder="Input NUPTK">
                                @error('nuptk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nuptk') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $teacher->nama }}" id="nama" placeholder="Input Nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 1</label>
                                <input name="alamat_1" type="text" class="form-control @error('alamat_1') is-invalid @enderror" value="{{ old('alamat_1') ?? $teacher->alamat_1 }}" id="alamat_1" placeholder="Input Alamat 1">
                                @error('alamat_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_1') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_2">Alamat 2</label>
                                <input name="alamat_2" type="text" class="form-control @error('alamat_2') is-invalid @enderror" value="{{ old('alamat_2') ?? $teacher->alamat_2 }}" id="alamat_2" placeholder="Input Alamat 2">
                                @error('alamat_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_2') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabkota">Kabupaten/Kota</label>
                                <input name="kabkota" type="text" class="form-control @error('kabkota') is-invalid @enderror" value="{{ old('kabkota') ?? $teacher->kabkota }}" id="kabkota" placeholder="Input Kota/Kab">
                                @error('kabkota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kabkota') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input name="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" value="{{ old('provinsi') ?? $teacher->provinsi }}" id="provinsi" placeholder="Input Provinsi">
                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp">No Handphone</label>
                                <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') ?? $teacher->no_hp }}" id="no_hp" placeholder="Input no HP">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') ?? $teacher->tempat_lahir }}" id="tempat_lahir" placeholder="Input Tempat Lahir">
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') ?? $teacher->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile">Foto Profil</label>
                                <input name="profile" type="file" class="form-control @error('profile') is-invalid @enderror" id="profile">
                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp">Foto KTP</label>
                                <input name="ktp" type="file" class="form-control @error('ktp') is-invalid @enderror" id="ktp">
                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ktp') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 offset"></div>
                    </div>
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $teacher->user->email }}" id="email" placeholder="Input Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="w-100">Mau Ganti Password?</label>
                                <a href="{{ route('edit.password.teacher', $teacher->id) }}" class="btn btn-primary w-100">Klik button ini!</a>
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
