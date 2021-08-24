@extends('layouts.master')

@section('title')
    Dashboard | Deatil Data Raport Siswa
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Detai Rapot</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" value="{{ $rapot->nis }}" id="nis" readonly>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="siswa">Nama</label>
                    <input type="text" id="siswa" class="form-control" value="{{ $rapot->siswa->nama }}" readonly>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" class="form-control" value="{{ $rapot->kelas->kelas }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="akademik">Akademik</label>
                    <input type="text" class="form-control" value="{{ $rapot->akademik }}" id="nis" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="integritas">Integritas</label>
                    <input type="text" id="integritas" class="form-control" value="{{ $rapot->integritas }}" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="religius">Religius</label>
                    <input type="text" id="religius" class="form-control" value="{{ $rapot->religius }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nasionalis">Nasionalis</label>
                    <input type="text" id="nasionalis" class="form-control" value="{{ $rapot->nasionalis }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mandiri">Mandiri</label>
                    <input type="text" id="mandiri" class="form-control" value="{{ $rapot->mandiri }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="gotong_royong">Gotong Royong</label>
                    <input type="text" id="gotong_royong" class="form-control" value="{{ $rapot->gotong_royong }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <input type="text" id="catatan" class="form-control" value="{{ $rapot->catatan }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mitra_pkl">Mitra DU/DI PKL</label>
                    <input type="text" id="mitra_pkl" class="form-control" value="{{ $rapot->mitra_pkl }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" class="form-control" value="{{ $rapot->lokasi }}" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="lama_pkl">Lama PKL</label>
                    <input type="text" id="lama_pkl" class="form-control" value="{{ $rapot->lama_pkl }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" id="keterangan" class="form-control" value="{{ $rapot->keterangan }}" readonly>
                    </iframe>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
