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

<a href="{{ route('cetak.rapot.id.multi11', $rapot->id) }}" class="btn btn-success w-20 ml-3" target="_blank">
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
                                <th scope="row" class="text-center">5</th>
                                <td>Bahasa Inggris dan Bahasa Asing Lainnya</td>
                                <td class="text-center">{{ $rapot->pinggris }}</td>
                                <td class="text-center">{{ $rapot->kinggris }}</td>
                            </tr>

                            <tr>
                                <th colspan="4">B. Muatan Peminatan Kejuruan</th>
                            </tr>

                            <tr>
                                <th colspan="4">C1. Pelajaran Kejuruan</th>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td>Produk Kreatif dan Kewirausahaan</td>
                                <td class="text-center">{{ $rapot->ppkk }}</td>
                                <td class="text-center">{{ $rapot->kpkk }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">2</th>
                                <td>Desain Grafis Percetakan</td>
                                <td class="text-center">{{ $rapot->ppercetakan }}</td>
                                <td class="text-center">{{ $rapot->kpercetakan }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">3</th>
                                <td>Animasi 2D dan 3D</td>
                                <td class="text-center">{{ $rapot->panimasi }}</td>
                                <td class="text-center">{{ $rapot->kanimasi }}</td>
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
                    <div class="card-header">
                        <p>{{ $rapot->akademik }}</p>
                    </div>
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
                                <td class="">{{ $rapot->ekskul }}</td>
                                <td class="">{{ $rapot->keterangan_ekskul }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
