<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <title>Cetak Rapot</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2" style="padding-left: 0 !important;">
                <img src="{{ public_path('images/logo-2.png') }}" alt="" class="w-100">
            </div>
            <div class="col-10 float-right text-center" style="margin-left: 30px">
                <b><span style="font-size: 35px">SMK NEGERI 1 CIBADAK</span></b>
                <br>
                <span style="font-size: 16px">Jl. Al-Muwahhiddin, Karangtengah, Cibadak, Kab. Sukabumi. Sukabumi 43351</span>
                <br>
                <span style="font-size: 16px">Tel/Fax: (0266) 532510, e-mail: smkn1_cibadak@yahoo.co.id</span>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px; padding-top: 0 !important;">
            <div class="col-12">
                <div class="w-100" style="height: 2px; background-color: #000004;"></div>
            </div>
        </div>

        <div class="row py-0">
            <div class="col-4">
                <span>Nama Peserta Didik</span>
            </div>
            <div class="col-8 float-right">
                <span>: <b>{{ $rapot->siswa->nama }}</b></span>
            </div>
        </div>

        <div class="row py-0">
            <div class="col-4">
                <span>NISN/NIS</span>
            </div>
            <div class="col-8 float-right">
                <span>: {{ $rapot->siswa->nis }}</span>
            </div>
        </div>

        <div class="row py-0">
            <div class="col-4">
                <span>Kelas</span>
            </div>
            <div class="col-8 float-right">
                <span>: {{ $rapot->kelas->kelas }}</span>
            </div>
        </div>

        <div class="row py-0" style="margin-bottom: 10px;">
            <div class="col-4">
                <span>Semester</span>
            </div>
            <div class="col-8 float-right">
                <span>: Ganjil</span>
            </div>
        </div>

        <div class="row">
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

                            <tr>
                                <th colspan="4">C2. Pelajaran Kejuruan</th>
                            </tr>

                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td>Sistem Komputer</td>
                                <td class="text-center">{{ $rapot->psiskom }}</td>
                                <td class="text-center">{{ $rapot->ksiskom }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">2</th>
                                <td>Komputer dan Jaringan Dasar</td>
                                <td class="text-center">{{ $rapot->pjaringan }}</td>
                                <td class="text-center">{{ $rapot->kjaringan }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">3</th>
                                <td>Pemrograman Dasar</td>
                                <td class="text-center">{{ $rapot->ppemrograman }}</td>
                                <td class="text-center">{{ $rapot->kpemrograman }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">4</th>
                                <td>Dasar Desain Grafis</td>
                                <td class="text-center">{{ $rapot->pdesain }}</td>
                                <td class="text-center">{{ $rapot->kdesain }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
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

        <div class="row">
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

        <div class="row">
            <div class="float-right" style="margin-top: 20px;">
                <span>Cibadak, 01 Juli 2019 <br>Kepala Sekolah,</span>
                <br><br><br>
                <span><b>Drs. Juanda, M.Si</b> <br>NIP 19640308 198903 1 007</span>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>
