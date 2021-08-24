@extends('layouts.master')

@section('title')
    Dashboard | Detail Data Raport Siswa
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

<a href="{{ route('cetak.rapot.id', $rapot->id) }}" class="btn btn-success w-20 ml-3" target="_blank">
    Cetak
</a>


<div class="card shadow mt-4">
    <div class="container py-5">
        <div class="row mt-2 py-0">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
                        <span>Nama Peserta Didik</span>
                    </div>
                    <div class="col-6 float-right">
                        <span>: <b>{{ $rapot->siswa->nama }}</b></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset"></div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
                        <span>Nama Sekolah</span>
                    </div>
                    <div class="col-6 float-right">
                        <span>: SMKN 1 CIBADAK</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 py-0">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
                        <span>NISN/NIS</span>
                    </div>
                    <div class="col-6 float-right">
                        <span>: {{ $rapot->siswa->nis }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset"></div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
                        <span>Alamat Sekolah</span>
                    </div>
                    <div class="col-6 float-right">
                        <span>: Jl. Al Muwahhidin</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 py-0">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
                        <span>Kelas</span>
                    </div>
                    <div class="col-6 float-right">
                        <span>: {{ $rapot->kelas->kelas }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 py-0">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
                        <span>Semester</span>
                    </div>
                    <div class="col-6 float-right">
                        <span>: Ganjil</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <p><b>A. Nilai Akademik</b></p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 1%">NO</th>
                                <th scope="col" class="text-center">Mata Pelajaran</th>
                                <th scope="col" class="text-center">Pengetahuan</th>
                                <th scope="col" class="text-center">Keterampilan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="4">B1. Muatan Nasional</th>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td>Pendidikan Agama dan Budi Pekerti</td>
                                <td class="text-center">{{ $rapot->ppai }}</td>
                                <td class="text-center">{{ $rapot->kpai }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">2</th>
                                <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                                <td class="text-center">{{ $rapot->ppkn }}</td>
                                <td class="text-center">{{ $rapot->kpkn }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">3</th>
                                <td>Bahasa Indonesia</td>
                                <td class="text-center">{{ $rapot->pindonesia }}</td>
                                <td class="text-center">{{ $rapot->kindonesia }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">4</th>
                                <td>Matematika</td>
                                <td class="text-center">{{ $rapot->pmtk }}</td>
                                <td class="text-center">{{ $rapot->kpkn }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">6</th>
                                <td>Sejarah Indonesia</td>
                                <td class="text-center">{{ $rapot->psejarah }}</td>
                                <td class="text-center">{{ $rapot->ksejarah }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">7</th>
                                <td>Bahasa Inggris dan Bahasa Asing Lainnya</td>
                                <td class="text-center">{{ $rapot->pinggris }}</td>
                                <td class="text-center">{{ $rapot->kinggris }}</td>
                            </tr>

                            <tr>
                                <th colspan="4">B2. Muatan Kewilayahan</th>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td>Seni Budaya</td>
                                <td class="text-center">{{ $rapot->psbk }}</td>
                                <td class="text-center">{{ $rapot->ksbk }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">2</th>
                                <td>Pendidikan Jasmani, Olahraga & Kesehatan</td>
                                <td class="text-center">{{ $rapot->ppjok }}</td>
                                <td class="text-center">{{ $rapot->kpjok }}</td>
                            </tr>

                            <tr>
                                <th colspan="4">B3. Muatan Lokal</th>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td>Bahasa Sunda</td>
                                <td class="text-center">{{ $rapot->psunda }}</td>
                                <td class="text-center">{{ $rapot->ksunda }}</td>
                            </tr>

                            <tr>
                                <th colspan="4">B. Muatan Peminatan Kejuruan</th>
                            </tr>

                            <tr>
                                <th colspan="4">C1. Dasar Bidang Keahlian</th>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td>Simulasi dan Komunikasi Digital</td>
                                <td class="text-center">{{ $rapot->psimdig }}</td>
                                <td class="text-center">{{ $rapot->ksimdig }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">2</th>
                                <td>Fisika</td>
                                <td class="text-center">{{ $rapot->pfisika }}</td>
                                <td class="text-center">{{ $rapot->kfisika }}</td>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">3</th>
                                <td>Kimia</td>
                                <td class="text-center">{{ $rapot->pkimia }}</td>
                                <td class="text-center">{{ $rapot->kkimia }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <p><b>B. Catatan Akademik</b></p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>{{ $rapot->akademik }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <p><b>C. Praktik Kerja Lapangan</b></p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 1%">NO</th>
                                <th scope="col" class="text-center">Mitra DU/DI</th>
                                <th scope="col" class="text-center">Lokasi</th>
                                <th scope="col" class="text-center">Lamanya (Bulan)</th>
                                <th scope="col" class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td class="text-center">{{ $rapot->mitra_pkl }}</td>
                                <td class="text-center">{{ $rapot->lokasi }}</td>
                                <td class="text-center">{{ $rapot->lama_pkl }}</td>
                                <td class="text-center">{{ $rapot->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <p><b>D. Ekstrakulikuler</b></p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 1%">NO</th>
                                <th scope="col" class="text-center">
                                    Kegiatan Ekstrakulikuler
                                </th>
                                <th scope="col" class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td class="text-center">{{ $rapot->ekskul }}</td>
                                <td class="text-center">{{ $rapot->keterangan_ekskul }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
