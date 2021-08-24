@extends('layouts.master')

@section('title')
    Dashboard | Tambah Guru
@endsection

@section('css')
    <style>
        .progress { position:relative; width:100%; }
        .percent { position:absolute; display:inline-block; left:50%; margin-top: 8px; color: #FFFFFF;}
   </style>
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

<div class="row my-4">
    <div class="col-md-3 offset"></div>
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Tambah dari Excel</h5>
                <p class="card-text">Pilih data Guru yang akan di tambhakan dan pastikan urutannya benar lalu upload.</p>
                <form method="POST" action="{{ url('/admin/dashboard/add/teacher/import') }}" id="formTeacher" enctype="multipart/form-data">
                    @csrf
                    <input name="excel" type="file" class="form-control btn btn-sm btn-secondary w-100">
                    <br>
                    <div class="progress my-3">
                        <div class="progress-bar progress-bar-striped" role="progressbar"></div>
                        <div class="percent">0%</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3 offset"></div>
</div>

<div class="text-center d-flex">
    <hr style="width: 46%;">
    <span class="px-3">ATAU</span>
    <hr style="width: 46%;">
</div>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Guru</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/teacher/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik">NIP <span class="text-danger">*</span></label>
                                <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" id="nik" placeholder="Input NIK">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nip">NIP <span class="text-danger">*</span></label>
                                <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" id="nip" placeholder="Input NIP">
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nuptk">NUPTK <span class="text-danger">*</span></label>
                                <input name="nuptk" type="text" class="form-control @error('nuptk') is-invalid @enderror" value="{{ old('nuptk') }}" id="nuptk" placeholder="Input NUPTK">
                                @error('nuptk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nuptk') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" placeholder="Input Nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 1 <span class="text-danger">*</span></label>
                                <input name="alamat_1" type="text" class="form-control @error('alamat_1') is-invalid @enderror" value="{{ old('alamat_1') }}" id="alamat_1" placeholder="Input Alamat 1">
                                @error('alamat_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_1') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 2 <span class="text-danger">*</span></label>
                                <input name="alamat_2" type="text" class="form-control @error('alamat_2') is-invalid @enderror" value="{{ old('alamat_2') }}" id="alamat_2" placeholder="Input Alamat 2">
                                @error('alamat_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_2') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabkota">Kabupaten/Kota <span class="text-danger">*</span></label>
                                <input name="kabkota" type="text" class="form-control @error('kabkota') is-invalid @enderror" value="{{ old('kabkota') }}" id="kabkota" placeholder="Input Kota/Kab">
                                @error('kabkota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kabkota') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi <span class="text-danger">*</span></label>
                                <input name="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" value="{{ old('provinsi') }}" id="provinsi" placeholder="Input Provinsi">
                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp">No Handphone <span class="text-danger">*</span></label>
                                <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" id="no_hp" placeholder="Input no HP">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                <input name="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" id="tempat_lahir" placeholder="Input Tempat Lahir">
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input name="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile">Foto Profil <span class="text-danger">*</span></label>
                                <input name="profile" type="file" class="form-control @error('profile') is-invalid @enderror" id="profile">
                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp">Foto KTP <span class="text-danger">*</span></label>
                                <input name="ktp" type="file" class="form-control @error('ktp') is-invalid @enderror" id="ktp">
                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ktp') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 offset"></div>
                    </div>
                    -->
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="Input Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Passsword <span class="text-danger">*</span></label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" placeholder="Input Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation <span class="text-danger">*</span></label>
                                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="Input Konfirmasi Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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

{{-- @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
    <script type="text/javascript">
            $(document).ready(function()
            {
                var bar = $('.progress-bar');
                var percent = $('.percent');

                    $('#formAdmin').ajaxForm({
                        beforeSend: function() {
                            var percentVal = '0%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        complete: function(xhr) {
                            alert('File Uploaded Successfully');
                            window.location.href = "/admin/dashboard/add/admin/import";
                        }
                });
            });
        </script>
@endpush --}}
