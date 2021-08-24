@extends('layouts.master')

@section('title')
    Dashboard | Edit Data Kelas
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

<a href="{{ route('table.class.list') }}" class="btn btn-primary w-20">
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
                <form action="{{ route('update.class', $class->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jurusan_id">Kode Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan_id" id="jurusan_id" class="js-example-basic-single form-control">
                                    <option value="{{ $class->jurusan_id }}" disabled>{{ $class->jurusan->kode_jurusan }}</option>
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
                                <input name="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas') ?? $class->kelas }}" id="kelas" placeholder="Input Kelas">
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
                                <input name="jumlah_siswa" type="text" class="form-control @error('jumlah_siswa') is-invalid @enderror" value="{{ old('jumlah_siswa') ?? $class->jumlah_siswa }}" id="jumlah_siswa" placeholder="Input Jumlah Siswa">
                                @error('jumlah_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jumlah_siswa') }}</strong>
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
