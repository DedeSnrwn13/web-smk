@extends('layouts.master')

@section('title')
    Dashboard | Tambah Jadwal Pelajaran
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Jadwal Pelajaran</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/jadwal/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="semester">Semester Ke <span class="text-danger">*</span></label>
                                    <select name="semester" id="semester" class="form-control" required>
                                        <option value="" disabled selected>Pilih Semester</option>
                                        <option value="Genap">Genap</option>
                                        <option value="Ganjil">Ganjil</option>
                                    </select>
                                    @error('semester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('semester') }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun">Tahun Pelajaran <span class="text-danger">*</span></label>
                                    <select name="tahun" id="tahun" class="form-control" required>
                                        <option value="" disabled selected>Pilih Tahun Pelajaran</option>
                                        <option value="2020/2021">2020/2021</option>
                                        <option value="2021/2022">2021/2022</option>
                                        <option value="2023/2024">2023/2024</option>
                                        <option value="2024/2025">2024/2025</option>
                                    </select>
                                    @error('tahun')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tahun') }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                    <select name="kelas_id" id="kelas" class="js-example-basic-single form-control" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                        @endforeach
                                    </select>
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
                                <label for="mapel">Mata Pelajaran <span class="text-danger">*</span></label>
                                    <select name="mapel_id" id="mapel" class="js-example-basic-single form-control" required>
                                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                        @foreach ($mapel as $map)
                                            <option value="{{ $map->id }}">{{ $map->mata_pelajaran }}</option>
                                        @endforeach
                                    </select>
                                    @error('mapel_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tahun') }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam">Jam <span class="text-danger">*</span></label>
                                <input required name="jam" type="text" id="jam" class="form-control">
                                @error('jam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jam') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_guru">Nama Guru <span class="text-danger">*</span></label>
                                    <select name="guru_id" id="nama_guru" class="js-example-basic-single form-control" required>
                                        <option value="" disabled selected>Pilih Guru</option>
                                        @foreach ($guru as $gu)
                                            <option value="{{ $gu->id }}">{{ $gu->nama }}</option>
                                        @endforeach
                                    </select>
                                @error('nama_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_guru') }}</strong>
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

