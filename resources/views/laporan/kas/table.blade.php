@extends('layouts.master')

@section('title')
    Laporan Arus KAS
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="text-center">
        <h4>Laporan Arus KAS</h4>
    </div>
		<br/>
		<a href="{{ route('cetak.kas') }}" class="btn btn-primary" target="_blank">Cetak ke PDF</a>
        <br><br>
		<table class="table table-bordered" id="crudTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Pemasukan</th>
                    <th>Pengeluaran</th>
					<th>KAS</th>
				</tr>
			</thead>
			<tbody>
				@php $no=1 @endphp
				<tr>
					<td>{{ $no++ }}</td>
					<td>Rp. {{ number_format($pemasukan) }}</td>
                    <td>Rp. {{ number_format($pengeluaran) }}</td>
					<td>Rp. {{ number_format($kas) }}</td>
				</tr>
			</tbody>
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
