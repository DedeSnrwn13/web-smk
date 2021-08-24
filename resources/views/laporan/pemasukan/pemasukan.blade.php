@extends('layouts.master')

@section('title')
    Laporan Pemasukan
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="text-center">
        <h4>List Laporan Pemasukan</h4>
    </div>
		<br/>
		<a href="{{ route('cetak.pemasukan') }}" class="btn btn-primary" target="_blank">Cetak Semua ke PDF</a>
        <br><br>
		<table class="table table-bordered" id="crudTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
                    <th>Jenis Pembayaran</th>
                    <th>Harus Dibayar</th>
					<th>Cicilan</th>
                    <th>Sisa</th>
                    <th style="width: 20%;">Cetak</th>
				</tr>
			</thead>
			<tbody>
				@php $no=1 @endphp
				@foreach($pemasukan as $p)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $p->tanggal }}</td>
                    <td>{{ $p->jenis_pembayaran }}</td>
                    <td>{{ $p->jumlah_pembayaran }}</td>
                    <td>{{ $p->sisa }}</td>
					<td>{{ number_format($p->cicilan) }}</td>
                    <th><a href="{{ route('cetak.pemasukan.id', $p->id) }}" class="btn btn-primary btn-sm" target="_blank">Cetak Ini Saja</a></th>
				</tr>
				@endforeach
			</tbody>
            <tfoot>
                <tr>
                    <td colspan="5"></td>
                    <td colspan="2">Jumlah Pemasukan: Rp. <b>{{number_format($jumlah_cicilan)}}</b></td>
                </tr>
            </tfoot>
		</table>
@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#crudTable').DataTable();
        });
    </script>
@endpush
