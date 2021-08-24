<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Pemasukan</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jenis Pembayaran</th>
                                <th>Harus Dibayar</th>
                                <th>Cicilan</th>
                                <th>Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @php
                                    $no = 1
                                @endphp
                                <td>{{ $no++ }}</td>
                                <td>{{ $pemasukan['tanggal'] }}</td>
                                <td>{{ $pemasukan['jenis_pembayaran'] }}</td>
                                <td>{{ number_format($pemasukan['jumlah_pembayaran']) }}</td>
                                <td>{{ number_format($pemasukan['cicilan'])}}</td>
                                <td>{{ number_format($pemasukan['sisa']) }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td colspan="2">Jumlah Pemasukan: Rp. <b>{{number_format($jumlah_pemasukan)}}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
