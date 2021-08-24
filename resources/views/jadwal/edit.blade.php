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

<a href="{{ route('table.jadwal.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Edit Data Jadwal Pelajaran</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.jadwal', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="semester">Semester Ke <span class="text-danger">*</span></label>
                                    <select name="semester" id="semester" class="form-control" required>
                                        <option value="{{ old('semester') ?? $jadwal->semester }}" selected>{{ old('semester') ?? $jadwal->semester }}</option>
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
                                        <option value="{{ old('tahun') ?? $jadwal->tahun }}" selected >{{ old('tahun') ?? $jadwal->tahun }}</option>
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
                                        <option value="{{ old('kelas_id') ?? $jadwal->kelas_id }}" selected>{{ old('kelas_id') ?? $jadwal->kelas->kelas }}</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
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
                                <label for="mapel">Mata Pelajaran <span class="text-danger">*</span></label>
                                    <select name="mapel_id" id="mapel" class="js-example-basic-single form-control" required>
                                        <option value="{{ old('mapel_id') ?? $jadwal->mapel_id }}" selected>{{ old('mapel_id') ?? $jadwal->mapel->mata_pelajaran }}</option>
                                        @foreach ($mapel as $map)
                                            <option value="{{ $map->id }}">{{ $map->mata_pelajaran }}</option>
                                        @endforeach
                                    </select>
                                    @error('mapel_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mapel_id') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam">Jam <span class="text-danger">*</span></label>
                                    <input required name="jam" type="time" id="jam" class="form-control" value="{{ $jadwal->jam }}">
                                @error('jam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guru') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_guru">Nama Guru <span class="text-danger">*</span></label>
                                    <select name="guru_id" id="nama_guru" class="js-example-basic-single form-control" required>
                                        <option value="{{ old('guru_id') ?? $jadwal->guru_id }}" selected>{{ old('guru_id') ?? $jadwal->guru->nama }}</option>
                                        @foreach ($guru as $gu)
                                            <option value="{{ $gu->id }}">{{ $gu->nama }}</option>
                                        @endforeach
                                    </select>
                                @error('guru_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guru_id') }}</strong>
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
