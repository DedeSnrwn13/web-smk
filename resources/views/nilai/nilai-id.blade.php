@extends('layouts.master')

@section('title')
    Dashboard | Tambah Data Nilai Siswa
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
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
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Nilai</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('post.nilai.siswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS <span class="text-danger">*</span></label>
                                {{-- <input type="text" name="nis" id="nis" class="form-control" required> --}}
                                    <select name="nis" id="nis" class="js-example-basic-single form-control" required>
                                        <option value="" disabled selected>Pilih NIS</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->nis }}">{{ $item->nis }}</option>
                                        @endforeach
                                    </select>
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="siswa_id">Nama <span class="text-danger">*</span></label>
                                {{-- <input type="text" name="siswa_id" id="siswa_id" class="form-control" readonly required> --}}
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
                                <label for="kelas_id">Kelas <span class="text-danger">*</span></label>
                                {{-- <input type="text" name="kelas_id" id="kelas_id" class="form-control" value="{{ old('kelas_id') }}" required> --}}
                                <select name="kelas_id" id="kelas_id" class="form-control" value="{{ old('kelas_id') }}" required>
                                    <option value="" disabled selected>Pilih Kelas Siswa</option>
                                    @foreach ($kelas as $kelass)
                                        <option value="{{ $kelass->id }}">{{ $kelass->kelas }}</option>
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
                    <hr>
                    <div id="container-inputnilai" class="row my-5">

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Catatan Akademik <span class="text-danger">*</span></label>
                                    <input type="text" name="akademik" id="akademik" class="form-control" required>
                                    @error('akademik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('akademik') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="integritas">Integritas<span class="text-danger">*</span></label>
                                    <input type="text" name="integritas" id="integritas" class="form-control" required>
                                    @error('integritas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('integritas') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religius">Religius <span class="text-danger">*</span></label>
                                    <input type="text" name="religius" id="religius" class="form-control" required>
                                    @error('religius')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('religius') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nasionalis">Nasionalis <span class="text-danger">*</span></label>
                                    <input type="text" name="nasionalis" id="nasionalis" class="form-control" required>
                                    @error('nasionalis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nasionalis') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mandiri">Mandiri <span class="text-danger">*</span></label>
                                    <input type="text" name="mandiri" id="mandiri" class="form-control" required>
                                    @error('mandiri')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mandiri') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gotong_royong">Gotong Royong <span class="text-danger">*</span></label>
                                    <input type="text" name="gotong_royong" id="gotong_royong" class="form-control" required>
                                    @error('gotong_royong')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gotong_royong') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="catatan"> Catatan</label>
                                    <input type="text" name="catatan" id="catatan" class="form-control" >
                                    @error('catatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('catatan') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mitra_pkl"> Mitra Pkl</label>
                                    <input type="text" name="mitra_pkl" id="mitra_pkl" class="form-control" >
                                    @error('mitra_pkl')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mitra_pkl') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokasi"> Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" >
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lokasi') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lama_pkl"> Lama Pkl</label>
                                    <input type="text" name="lama_pkl" id="lama_pkl" class="form-control" >
                                    @error('lama_pkl')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lama_pkl') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan">Keterangan PKL</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control" >
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keterangan') }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ekskul">Ekstrakulikuler</label>
                                <select name="ekskul" id="ekskul" class="js-example-basic-single form-control" value="{{ old('ekskul') }}" >
                                    <option value="" disabled selected>Pilih Ekskul Siswa</option>
                                    @foreach ($ekskul as $eks)
                                        <option value="{{ $eks->nama }}">{{ $eks->nama }}</option>
                                    @endforeach
                                </select>
                                @error('ekskul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ekskul') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan_ekskul">Keterangan Ekstrakulikuler</label>
                                    <input type="text" name="keterangan_ekskul" id="keterangan_ekskul" class="form-control">
                                        @error('keterangan_ekskul')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keterangan_ekskul') }}</strong>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            $('#kelas_id').on('change', function() {
                const kelas_id = $(this).val();

                $.ajax({
                    url: "/admin/dashboard/getmapel/" + kelas_id,
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                    },
                    success: function(data) {
                        // Clear #container-inputnilai terlebih dahulu
                        $("#container-inputnilai").empty();

                        data.forEach(function(d) {
                            const input = ` <div class="col-md-4">
                                <div class="form-group">
                                    <label>${d.mata_pelajaran} <span class="text-danger"> *</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="hidden" name="mapel_id[]" value="${d.id}">
                                        <input type="number" name="nilai_keterampilan[]" value="${d.nilai_keterampilan}" class="form-control" placeholder="Input Nilai Keterampilan">
                                        <input type="number" name="nilai_pengetahuan[]" value="${d.nilai_pengetahuan}" class="form-control" placeholder="Input Nilai Pengetahuan">
                                    </div>
                                </div>
                            </div>`;

                            // Memasukkan input ke container-inputnilai
                            $("#container-inputnilai").append(input);
                        });
                    }
                });
            });
        });
    </script>
@endpush
