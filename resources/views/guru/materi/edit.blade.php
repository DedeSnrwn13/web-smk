@extends('layouts.app')

@section('title')
    Dashboard | Edit Materi Pelajran
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

<a href="{{ url('/home') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Edit Materi</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.materi', $materi->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="semester">No <span class="text-danger">*</span></label>
                                    <input type="text" name="no" id="no" class="form-control" required @error('no') is-invalid @enderror value="{{ old('no') ?? $materi->no }}" id="no">
                                    @error('no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="judul">Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" id="judul" class="form-control" required @error('judul') is-invalid @enderror value="{{ old('judul') ?? $materi->judul }}" id="judul">
                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                    <select name="kelas_id" id="kelas" class="form-control js-example-basic-single" required>
                                        <option value="{{ old('kelas_id') ?? $materi->kelas_id }}" selected>{{ old('kelas_id') ?? $materi->kelas->kelas }}</option>
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
                                    <select name="mapel_id" id="mapel" class="form-control js-example-basic-single" required>
                                        <option value="{{ old('mapel_id') ?? $materi->mapel_id }} " selected>{{ old('mapel_id') ?? $materi->mapel->mata_pelajaran }}</option>
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
                                <label for="lampiran">lampiran <span class="text-danger">*</span></label>
                                <input name="lampiran" type="file" class="form-control @error('lampiran') is-invalid @enderror" value="{{ old('lampiran') }}" id="lampiran">
                                @error('lampiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lampiran') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam">Link YouTube</label>
                                <input name="link" type="text" id="link" class="form-control" @error('link') is-invalid @enderror value="{{ old('link') ?? $materi->link }}" id="link">
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
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
