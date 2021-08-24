@extends('layouts.master')

@section('title')
    Dashboard | Tambah Mata Pelajran
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Mata Pelajaran</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/lesson/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mata_pelajaran">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                                {{-- <input name="mata_pelajaran" type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror" value="{{ old('mata_pelajaran') }}" id="mata_pelajaran" placeholder="Input Mata Pelajaran"> --}}
                                <select name="mata_pelajaran" id="mata_pelajaran" class="js-example-basic-single form-control @error('mata_pelajaran') is-invalid @enderror" value="{{ old('mata_pelajaran') }}">
                                    <option value="" disabled>--Pilih Nama Mata Pelajaran--</option>
                                    @foreach ($mapels as $mapel)
                                        <option value="{{ $mapel->nama }}">{{ $mapel->nama }}</option>
                                    @endforeach
                                </select>
                                @error('mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mata_pelajaran') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode_mapel">Kode Mata Pelajaran <span class="text-danger">*</span></label>
                                <input name="kode_mapel" type="text" class="form-control @error('kode_mapel') is-invalid @enderror" value="{{ old('kode_mapel') }}" id="kode_mapel" placeholder="Input Kode mapel">
                                @error('kode_mapel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kode_mapel') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas_id">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" id="kelas_id" class="js-example-basic-single form-control">
                                    <option value="" disabled>--Pilih Kelas--</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{$item->id}}">{{$item->kelas}}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelas_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detail_mapel">Detail Mata Pelajaran <span class="text-danger">*</span></label>
                                <textarea name="detail_mapel" id="detail_mapel" cols="30" rows="10" class="form-control @error('detail_mapel') is-invalid @enderror">{{ old('detail_mapel') }}</textarea>
                                @error('detail_mapel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('detail_mapel') }}</strong>
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
