@extends('layouts.master')

@section('title')
    Dashboard | Deatil Data Guru
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
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Deatil Data Guru <i class="fas fa-exchange-alt"></i> {{ $teacher->nama }}</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik">NIP</label>
                                <input type="text" class="form-control" value="{{ $teacher->nik ?? '' }}" id="nik" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" value="{{ $teacher->nip ?? '' }}" id="nip" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nuptk">NUPTK</label>
                                <input type="text" class="form-control" value="{{ $teacher->nuptk ?? '' }}" id="nuptk" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $teacher->nama ?? '' }}" id="nama" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 1</label>
                                <input type="text" class="form-control" value="{{ $teacher->alamat_1 ?? '' }}" id="alamat_1" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_2">Alamat 2</label>
                                <input type="text" class="form-control" value="{{ $teacher->alamat_2 ?? '' }}" id="alamat_2" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input name="provinsi" type="text" class="form-control" value="{{ $teacher->provinsi ?? '' }}" id="provinsi" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabkota">Kabupaten/Kota</label>
                                <input type="text" class="form-control" value="{{ $teacher->kabkota ?? '' }}" id="kabkota" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp">No Handphone</label>
                                <input type="text" class="form-control" value="{{ $teacher->no_hp ?? '' }}" id="no_hp" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" value="{{ $teacher->tempat_lahir ?? '' }}" id="tempat_lahir" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{ $teacher->tanggal_lahir ?? '' }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{ $teacher->user->email ?? '' }}" id="email" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="w-100">Mau Ganti Password?</label>
                                <a href="{{ route('edit.password.teacher', $teacher->id) }}" class="btn btn-primary w-100">Klik button ini!</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile">Foto Profil</label>
                                <img src="{{ asset('/storage/images/profile/'.$teacher->profile) }}" class="img-fluid w-100" style="height: 300px; object-fit: cover; object-position: center;"  alt="Foto Profil">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp">Foto KTP</label>
                                <img src="{{ asset('/storage/images/ktp/'.$teacher->ktp) }}" class="img-fluid w-100"  style="height: 300px; object-fit: cover; object-position: center;" alt="Foto KTP">
                            </div>
                        </div>
                    </div>
            </div>
		</div>
	</div>
</div>
@endsection
