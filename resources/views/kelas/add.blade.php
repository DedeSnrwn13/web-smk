@extends('layouts.master')

@section('title')
    Dashboard | Tambah Kelas
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Kelas</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/class/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jurusan_id">Kode Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan_id" id="kelas" class="form-control">
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jurusan_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" id="kelas">
                                    <option value="">Pilih Kode Kelas</option>
                                    <option value="10 A1">10 A1</option>
                                    <option value="10 A2">10 A2</option>
                                    <option value="11 A1">11 A1</option>
                                    <option value="11 A2">11 A2</option>
                                    <option value="12 A1">12 A1</option>
                                    <option value="12 A2">12 A2</option>
                                    <option value="" disabled>==========</option>
                                    <option value="10 E1">10 E1</option>
                                    <option value="10 E2">10 E2</option>
                                    <option value="11 E1">11 E1</option>
                                    <option value="11 E2">11 E2</option>
                                    <option value="12 E1">12 E1</option>
                                    <option value="12 E2">12 E2</option>
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
                                <label for="jumlah_siswa">Jumlah Siswa <span class="text-danger">*</span></label>
                                <input name="jumlah_siswa" type="text" class="form-control @error('jumlah_siswa') is-invalid @enderror" value="{{ old('jumlah_siswa') }}" id="jumlah_siswa" placeholder="Input Jumlah Siswa">
                                @error('jumlah_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jumlah_siswa') }}</strong>
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
