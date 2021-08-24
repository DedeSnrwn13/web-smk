@extends('layouts.master')

@section('title')
    Dashboard | Tambah Data Pemasukan
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Data Pemasukan</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/pemasukan/store" method="POST">
                    @csrf
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
                                <select name="siswa_id" id="siswa_id" class="js-example-basic-single form-control" value="{{ old('siswa_id') }}" required>
                                    <option value="" disabled selected>Pilih Nama Siswa</option>
                                    @foreach ($siswa as $siswas)
                                        <option value="{{ $siswas->id }}">{{ $siswas->nama }}</option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('siswa_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan_id" id="jurusan" class="js-example-basic-single form-control" required>
                                    <option value="" disabled selected>Pilih Jurusan</option>
                                    @foreach ($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jurusan_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" id="kelas" class="js-example-basic-single form-control" value="{{ old('kelas') }}" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach ($kelas as $kel)
                                        <option value="{{ $kel->id }}">{{ $kel->kelas }}</option>
                                    @endforeach
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
                                <label for="jenisPembayaran">Jenis Pemayaran <span class="text-danger">*</span></label>
                                <select name="jenis_pembayaran" id="jenisPembayaran" class="form-control js-example-basic-single">
                                    <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                                    @foreach ($jenis_pembayaran as $pembayaran)
                                        <option value="{{ $pembayaran->jenis_pembayaran }}">{{ $pembayaran->jenis_pembayaran }}</option>
                                    @endforeach
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
                                <label for="jumlah_pembayaran">jumlah pembayaran <span class="text-danger">*</span></label>
                                <select name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control js-example-basic-single">
                                    <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                                    @foreach ($jenis_pembayaran as $pembayaran)
                                        <option value="{{ $pembayaran->jumlah }}">Rp. {{ number_format($pembayaran->jumlah) }}</option>
                                    @endforeach
                                </select>
                                @error('jumlah_pembayaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jumlah_pembayaran') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cicilan">Cicilan <span class="text-danger">*</span></label>
                                <input name="cicilan" type="number" class="form-control @error('cicilan') is-invalid @enderror" value="{{ old('cicilan') }}" id="cicilan" placeholder="Input Cicilan">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="siswa_id"]').on('change', function() {
                var siswaID = $(this).val();
                if(siswaID) {
                    $.ajax({
                        url: '/tagihan-siswa/'+siswaID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="tagihan"]').empty();
                            $.each(data, function(value, key) {
                            $('select[name="tagihan"]').append('<option value="'+ key +'">'+ key +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="tagihan"]').empty();
                }
            })
        });
    </script>
    <!--
    <script>
        $(function () {
             $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $('#siswa_id').on('change', function () {
                $.ajax({
                    {{-- url: '{{ route('get.data.tagihan') }}', --}}
                    method: 'GET',
                    data: {id: $(this).val()},
                    success: function (response) {
                        $('#tagihan').empty();

                        $.each(response, function (jumlah, jumlah_tagihan) {
                            $('#tagihan').append(new Option(jumlah_tagihan, jumlah))
                        })
                    }
                })
            });
        });
    </script>
    -->
@endpush

