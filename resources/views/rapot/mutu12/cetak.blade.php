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
                                <th scope="row" class="text-center">7</th>
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
                                <td>Pengambilan Contoh dan Pengujian Fisik- Mekanis</td>
                                <td class="text-center">{{ $rapot->pmekanis }}</td>
                                <td class="text-center">{{ $rapot->kmekanis }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">3</th>
                                <td>Pengujian Secara Mikribiologis</td>
                                <td class="text-center">{{ $rapot->pbiologis }}</td>
                                <td class="text-center">{{ $rapot->kbiologis }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">4</th>
                                <td>Pengujian Secara Kimia dan Instrumental</td>
                                <td class="text-center">{{ $rapot->pinstrumental }}</td>
                                <td class="text-center">{{ $rapot->kinstrumental }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">5</th>
                                <td>Pengujian Mutu Pangan, Non Pangan, Air dan Limbah Industri</td>
                                <td class="text-center">{{ $rapot->ppengujian }}</td>
                                <td class="text-center">{{ $rapot->kpengujian }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">6</th>
                                <td>Pertanian</td>
                                <td class="text-center">{{ $rapot->ppertanian }}</td>
                                <td class="text-center">{{ $rapot->kpertanian }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">7</th>
                                <td>Keamanan Pangan dan Sistem Manajemen Mutu Pangan</td>
                                <td class="text-center">{{ $rapot->pkeamanan }}</td>
                                <td class="text-center">{{ $rapot->kkeamanan }}</td>
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

        <div class="row" >
            <div class="col-12" style="margin-top: 80%;">
                <p ><b>D. Ekstrakulikuler</b></p>
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
