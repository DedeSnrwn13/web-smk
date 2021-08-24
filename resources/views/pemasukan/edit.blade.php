@extends('layouts.master')

@section('title')
    Dashboard | Edit Data Admin
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Data Pemasukkan</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/table/list/pemasukan/{{ $pemasukan->id }}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                                <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" id="tanggal">
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="siswa_id">Nama <span class="text-danger">*</span></label>
                                <select name="siswa_id" id="siswa_id" class="form-control">
                                    <option value="{{ $pemasukan->siswa_id }}">{{ $pemasukan->siswa->nama }}</option>
                                </select>
                                @error('siswa_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('siswa_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" id="kelas_id" class="form-control">
                                    <option value="{{ $pemasukan->kelas_id }}">{{ $pemasukan->kelas->kelas }}</option>
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
                                <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan_id" id="jurusan_id" class="form-control">
                                    <option value="{{ $pemasukan->jurusan_id }}">{{ $pemasukan->jurusan->nama }}</option>
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
                                <label for="jenisPembayaran">Jenis Pemayaran <span class="text-danger">*</span></label>
                                <select name="jenis_pembayaran" id="jenisPembayaran" class="form-control">
                                    <option value="{{ $pemasukan->jenis_pembayaran }}" selected>{{ $pemasukan->jenis_pembayaran }}</option>
                                </select>
                                @error('jenis_pembayaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_pembayaran') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sisa">Pembayaran sebelumnya<span class="text-danger">*</span></label>
                                <input type="number" name="cicilan_sebelumnya" class="form-control" value="{{ $pemasukan->cicilan }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sisa">Sisa pembayaran <span class="text-danger">*</span></label>
                                <input type="number" name="sisa" class="form-control" value="{{ $pemasukan->sisa }}">
                                @error('sisa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sisa') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cicilan">Cicilan <span class="text-danger">*</span></label>
                                <input name="cicilan" type="text" class="form-control @error('cicilan') is-invalid @enderror" value="{{ old('cicilan') }}" id="cicilan" placeholder="Input Cicilan">
                                @error('cicilan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cicilan') }}</strong>
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
