@extends('layouts.master')

@section('title')
    Dashboard | Tambah Data Nilai Siswa 10 Multimedia
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
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
                    <h4 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Nilai 10 Multimedia, kode kelas [10 E1 - 10 E2]</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('post.nilai.multi10') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nis">NIS <span class="text-danger">*</span></label>
                                    {{-- <input type="text" name="nis" id="nis" class="form-control" required> --}}
                                        <select name="nis" id="nis" class="js-example-basic-single form-control" required>
                                            <option value="" disabled>Pilih NIS</option>
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
                                        <option value="" disabled >Pilih Nama Siswa</option>
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
                                    <select name="kelas_id" id="kelas_id" class="js-example-basic-single form-control" value="{{ old('kelas_id') }}" required>
                                        <option value="" disabled >Pilih Kelas Siswa</option>
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
                        <div class="row my-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Matematika <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="pmtk" id="pmtk" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('pmtk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pmtk') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kmtk" id="kmtk" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kmtk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kmtk') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Pendidikan Agama dan Budi Pekerti <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="ppai" id="ppai" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('ppai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ppai') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kpai" id="kpai" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kpai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kpai') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Bahasa Indonesia <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="pindonesia" id="pindonesia" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('pindonesia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pindonesia') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kindonesia" id="kindonesia" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kindonesia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kindonesia') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Pendidikan Pancasila dan Kewarganegaraan <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="ppkn" id="ppkn" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('ppkn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ppkn') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kpkn" id="kpkn" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kpkn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kpkn') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Bahasa Inggris dan Bahasa Asing Lainnya <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="pinggris" id="pinggris" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('pinggris')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pinggris') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kinggris" id="kinggris" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kinggris')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kinggris') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Kimia <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="pkimia" id="pkimia" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('pkimia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pkimia') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kkimia" id="kkimia" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kkimia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kkimia') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Fisika <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="pfisika" id="pfisika" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('pfisika')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pfisika') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kfisika" id="kfisika" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kfisika')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kfisika') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Bahasa Sunda <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="psunda" id="psunda" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('psunda')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('psunda') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="ksunda" id="ksunda" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('ksunda')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ksunda') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Sejarah Indonesia <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="psejarah" id="psejarah" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('psejarah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('psejarah') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="ksejarah" id="ksejarah" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('ksejarah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ksejarah') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Seni Budaya <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="psbk" id="psbk" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('psbk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('psbk') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="ksbk" id="ksbk" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('ksbk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ksbk') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Simulasi Digital <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="psimdig" id="psimdig" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('psimdig')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('psimdig') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="ksimdig" id="ksimdig" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('ksimdig')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ksimdig') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Sistem Komputer <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="psiskom" id="psiskom" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('psiskom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('psiskom') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="ksiskom" id="ksiskom" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('ksiskom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ksiskom') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Komputer dan Jaringan Dasar <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="pjaringan" id="pjaringan" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('pjaringan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pjaringan') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kjaringan" id="kjaringan" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kjaringan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kjaringan') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Pemrograman Dasar <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="ppemrograman" id="ppemrograman" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('ppemrograman')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('ppemrograman') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kpemrograman" id="kpemrograman" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kpemrograman')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kpemrograman') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="mapel">Dasar Desain Grafis <span class="text-danger">*</span></label>
                                    <div class="col-md-12 px-0">
                                        <input type="number" name="pdesain" id="pdesain" class="form-control" required placeholder="Input Nilai Pengetahuan">
                                        @error('pdesain')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pdesain') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 px-0 mt-2">
                                        <input type="number" name="kdesain" id="kdesain" class="form-control" required placeholder="Input Nilai Keterampilan">
                                        @error('kdesain')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kdesain') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row my-4">
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

                        <div class="row my-4">
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

                        <div class="row my-4">
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
                                    <label for="ekskul">Ekstrakulikuler</label>
                                    <select name="ekskul" id="ekskul" class="js-example-basic-single form-control" value="{{ old('ekskul') }}" >
                                        <option value="" disabled>Pilih Ekskul Siswa</option>
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

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="keterangan_ekskul"> Ket Ekstrakulikuler</label>
                                    <input type="text" name="keterangan_ekskul" id="keterangan_ekskul" class="form-control">
                                    @error('keterangan_ekskul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keterangan_ekskul') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

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
@endpush
