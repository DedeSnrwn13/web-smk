@extends('layouts.master')

@section('title')
    Laporan Pengeluaran
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="text-center">
        <h4>List Laporan Pengeluaran</h4>
    </div>
		<br/>
		<a href="{{ route('cetak.pengeluaran') }}" class="btn btn-primary" target="_blank">Cetak Semua ke PDF</a>
        <br><br>
		<table class="table table-bordered" id="crudTable">
			<thead>
				<tr>
					<th>No</th>
                    <th>Nama transaksi</th>
					<th>Tanggal</th>
                    <th>Jumlah</th>
					<th>Harga</th>
                    <th>Total</th>
                    <th>Cetak</th>
				</tr>
			</thead>
			<tbody>
				@php $no=1 @endphp
				@foreach($pengeluaran as $p)
				<tr>
					<td>{{ $no++ }}</td>
                    <td>{{ $p->nama_transaksi }}</td>
					<td>{{ $p->tanggal }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->total }}</td>
					<td>{{ $p->total }}</td>
                    <th><a href="{{ route('cetak.pengeluaran.id', $p->id) }}" class="btn btn-primary btn-sm" target="_blank">Cetak Ini Saja</a></th>
				</tr>
				@endforeach
			</tbody>
            <tfoot>
                <tr>
                    <td colspan="5"></td>
                    <td colspan="2">Jumlah Pengeluaran: Rp. <b>{{number_format($jumlah_pengeluaran)}}</b></td>
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
