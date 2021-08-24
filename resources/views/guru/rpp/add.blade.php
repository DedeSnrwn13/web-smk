@extends('layouts.app')

@section('title')
    Dashboard | Tambah RPP
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah RPP</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/rpp/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no">No <span class="text-danger">*</span></label>
                                    <input type="number" name="no" id="no" class="form-control" required>
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
                                <label for="guru">Nama Guru <span class="text-danger">*</span></label>
                                    <select name="guru_id" id="guru" class="js-example-basic-single form-control" required>
                                        <option value="" disabled selected>Pilih Nama Guru</option>
                                        @foreach ($guru as $gu)
                                            <option value="{{ $gu->id }}">{{ $gu->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('guru_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('guru_id') }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik">NIK <span class="text-danger">*</span></label>
                                    <select name="nik" id="nik" class="js-example-basic-single form-control" required>
                                        <option value="" disabled selected>Pilih NIK</option>
                                        @foreach ($guru as $gu)
                                            <option value="{{ $gu->nik }}">{{ $gu->nik }}</option>
                                        @endforeach
                                    </select>
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @enderror
                                </label>
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
                                            <strong>{{ $errors->first('mapel_id') }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ki">KI <span class="text-danger">*</span></label>
                                    <select name="ki" id="ki" class="form-control js-example-basic-single" required>
                                        <option value="" disabled selected>Pilih KI</option>
                                        <option value="3.1">3.1</option>
                                        <option value="3.2">3.2</option>
                                        <option value="3.3">3.3</option>
                                        <option value="3.4">3.4</option>
                                        <option value="3.5">3.5</option>
                                        <option value="3.6">3.6</option>
                                        <option value="3.7">3.7</option>
                                        <option value="3.8">3.8</option>
                                        <option value="3.9">3.9</option>
                                        <option value="3.10">3.10</option>
                                        <option value="3.11">3.11</option>
                                        <option value="3.12">3.12</option>
                                        <option value="3.13">3.13</option>
                                        <option value="3.14">3.14</option>
                                        <option value="3.15">3.15</option>
                                        <option value="3.16">3.16</option>
                                        <option value="3.17">3.17</option>
                                        <option value="3.18">3.18</option>
                                        <option value="3.19">3.19</option>
                                        <option value="3.20">3.20</option>
                                    </select>
                                    @error('ki')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ki') }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kd">KD <span class="text-danger">*</span></label>
                                    <select name="kd" id="kd" class="form-control js-example-basic-single" required>
                                        <option value="" disabled selected>Pilih KD</option>
                                        <option value="4.1">4.1</option>
                                        <option value="4.2">4.2</option>
                                        <option value="4.3">4.3</option>
                                        <option value="4.4">4.4</option>
                                        <option value="4.5">4.5</option>
                                        <option value="4.6">4.6</option>
                                        <option value="4.7">4.7</option>
                                        <option value="4.8">4.8</option>
                                        <option value="4.9">4.9</option>
                                        <option value="4.10">4.10</option>
                                        <option value="4.11">4.11</option>
                                        <option value="4.12">4.12</option>
                                        <option value="4.13">4.13</option>
                                        <option value="4.14">4.14</option>
                                        <option value="4.15">4.15</option>
                                        <option value="4.16">4.16</option>
                                        <option value="4.17">4.17</option>
                                        <option value="4.18">4.18</option>
                                        <option value="4.19">4.19</option>
                                        <option value="4.20">4.20</option>
                                    </select>
                                    @error('kd')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kd') }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lampiran">Dokumen RPP <span class="text-danger">*</span></label>
                                <input name="lampiran" type="file" class="form-control" id="lampiran">
                                @error('lampiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lampiran') }}</strong>
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
