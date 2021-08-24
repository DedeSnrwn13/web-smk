@extends('layouts.master')

@section('title')
    Dashboard | Deatil Data Siswa
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

<a href="{{ route('table.student.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Deatil Data Siswa <i class="fas fa-exchange-alt"></i> {{ $student->nama }}</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
                        <div class="col-md-12">
                            <h1>Siswa</h1>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" value="{{ $student->nis }}" id="nis" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" value="{{ $student->nisn }}" id="nisn" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $student->nama }}" id="nama" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 1</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_1 }}" id="alamat_1" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_2">Alamat 2</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_2 }}" id="alamat_2" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabkota">Kabupaten/Kota</label>
                                <input type="text" class="form-control" value="{{ $student->kabkota }}" id="kabkota" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" value="{{ $student->provinsi }}" id="provinsi" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" value="{{ $student->tempat_lahir }}" id="tempat_lahir" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{ $student->tanggal_lahir }}" id="tanggal_lahir" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="{{ $student->jenis_kelamin  }}" id="jenis_kelamin" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input name="agama" type="text" class="form-control" value="{{ $student->agama }}" id="agama" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_dalam_keluarga">Status Dalam Keluarga</label>
                                <input name="status_dalam_keluarga" type="text" class="form-control" value="{{ $student->status_dalam_keluarga }}" id="status_dalam_keluarga" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="anak_ke">Anak Ke</label>
                                <input type="text" class="form-control" value="{{ $student->anak_ke }}" id="anak_ke" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="diterima_dikelas">Diterima di Kelas</label>
                                <input type="text" class="form-control" value="{{ $student->kelas['kelas'] }}" id="diterima_dikelas" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pada_tanggal">Pada Tanggal</label>
                                <input type="date" class="form-control" value="{{ $student->pada_tanggal }}" id="pada_tanggal" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jurusan">jurusan</label>
                                <input type="text" class="form-control" value="{{ $student->jurusan['nama'] }}" id="jurusan" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" value="{{ $student->no_hp }}" id="no_hp" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <h2>Orang Tua</h2>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" value="{{ $student->nama_ayah }}" id="nama_ayah" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" value="{{ $student->nama_ibu }}" id="nama_ibu" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_rumah">No Telp Rumah </label>
                                <input type="text" class="form-control" value="{{ $student->nohp_rumah }}" id="nohp_rumah" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" value="{{ $student->pekerjaan_ayah }}" id="pekerjaan_ayah" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" value="{{ $student->pekerjaan_ibu }}" id="pekerjaan_ibu" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Ortu</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_ortu }}" id="alamat_ortu" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <h1>Wali</h1>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_wali">Nama Wali</label>
                                <input type="text" class="form-control" value="{{ $student->nama_wali }}" id="nama_wali" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_wali">Alamat Wali</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_wali }}" id="alamat_wali" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_wali">No HP Wali</label>
                                <input type="text" class="form-control" value="{{ $student->nohp_wali }}" id="nohp_wali" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                <input type="text" class="form-control" value="{{ $student->pekerjaan_wali }}" id="pekerjaan_wali" readonly>
                            </div>
                        </div>
                        <div class="col-md-8 offset"></div>
                    </div>
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-md-12">
                            <h2>Akun</h2>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{ $student->user->email }}" id="email" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="w-100">Mau Ganti Password?</label>
                                <a href="{{ route('edit.password.student', $student->id) }}" class="btn btn-primary w-100">Klik button ini!</a>
                            </div>
                        </div>
                        <div class="col-md-4 offset"></div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="profile">Foto Profil</label>
                                <img src="{{ asset('/storage/images/profile/'.$student->profile) }}" class="img-fluid w-100" style="height: 300px; object-fit: cover; object-position: center;"  alt="Foto Profil">
                            </div>
                        </div>
                    </div>
	</div>
</div>
@endsection
