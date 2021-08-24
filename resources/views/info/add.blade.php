@extends('layouts.master')

@section('title')
    Dashboard | Tambah Informasi
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Informasi</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/info/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judul">Judul <span class="text-danger">*</span></label>
                                <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" id="judul" placeholder="Input Judul Informasi">
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lampiran">lampiran <span class="text-danger">*</span></label>
                                <input name="lampiran" type="file" class="form-control @error('lampiran') is-invalid @enderror" value="{{ old('lampiran') }}" id="lampiran">
                                @error('lampiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lampiran') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Informasi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @enderror
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

