@extends('layouts.master')

@section('title')
    Dashboard | Edit Data Jenis Pembayaran
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

<a href="{{ route('table.pembayaran.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Edit Data Admin</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.pembayaran', $jenis_pembayaran->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no">NO <span class="text-danger">*</span></label>
                                <input name="no" type="number" class="form-control @error('no') is-invalid @enderror" value="{{ $jenis_pembayaran->no ?? old('no') }}" id="no" placeholder="Input NO">
                                @error('no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenisPembayaran">Jenis Pembayaran <span class="text-danger">*</span></label>
                                <select name="jenis_pembayaran" id="jenisPembayaran" class="form-control @error('jenis_pembayaran') is-invalid @enderror" value="{{ old('jenis_pembayaran') }}">
                                    <option value="{{ $jenis_pembayaran->jenis_pembayaran ?? '' }}" selected>{{ $jenis_pembayaran->jenis_pembayaran ?? 'Pilih Jenis Pembayaran' }}</option>
                                    <option value="SPP">SPP</option>
                                    <option value="Uang Bangunan">Uang Bangunan</option>
                                    <option value="PKL">PKL</option>
                                    <option value="Daftar Ulang">Daftar Ulang</option>
                                    <option value="Infak">Infak</option>
                                    <option value="Perpustakaan">Perpustakaan</option>
                                    <option value="Siswa Baru">Siswa Baru</option>
                                    <option value="Perpisahan">Perpisahan</option>
                                </select>
                                @error('jenis_pembayaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_pembayaran') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah">Jumlah <span class="text-danger">*</span></label>
                                <input name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" value="{{ $jenis_pembayaran->jumlah ?? old('jumlah') }}" id="jumlah" placeholder="Input Jumlah">
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jumlah') }}</strong>
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
