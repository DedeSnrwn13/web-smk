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
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Edit Data jurusan</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.major', $major->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_jurusan">Kode Jurusan <span class="text-danger">*</span></label>
                                <input name="kode_jurusan" type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" value="{{ old('kode_jurusan') ?? $major->kode_jurusan }}" id="kode_jurusan" placeholder="Input Kode Jurusan">
                                @error('kode_jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kode_jurusan') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $major->nama }}" id="nama" placeholder="Input Nama Jurusan">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo Jurusan </label>
                                <input name="logo" type="file" class="form-control @error('logo') is-invalid @enderror" id="logo">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Input Deskripsi Jurusan">{{ old('deskripsi') ?? $major->deskripsi  }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @enderror
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
