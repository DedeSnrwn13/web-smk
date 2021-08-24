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

<a href="{{ route('table.major.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Deatil Data Jurusan <i class="fas fa-exchange-alt"></i> {{ $major->nama }}</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kode_jurusan">Kode Jurusan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $major->kode_jurusan }}" id="kode_jurusan">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $major->nama }}" id="nama">
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="logo">Logo Jurusan </label>
                    <img src="{{asset('/storage/images/logo/'.$major->logo)}}" class="img-fluid w-100" style="height: 300px; object-fit: cover; object-position: center;"  alt="Logo Jurusan">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                    <textarea cols="30" rows="10" class="form-control" id="deskripsi">{{ $major->deskripsi  }}</textarea>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
