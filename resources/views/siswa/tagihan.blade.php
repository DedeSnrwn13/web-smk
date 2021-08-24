@extends('layouts.app')

@section('title')
    Dashboard | Tagihan Siswa
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')
<!-- Section Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pemabayaran</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Cicilan Anda</th>
                                <th>Sisa Yang Harus Dibayar</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($tagihan as $tagih)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $tagih->jenis_pembayaran }}</td>
                                        <td>Rp. {{ number_format($tagih->jumlah_pembayaran) }}</td>
                                        <td>Rp. {{ number_format($tagih->cicilan) }}</td>
                                        <td>Rp. {{ number_format($tagih->sisa) }}</td>
                                    </tr>
                                @endforeach
                                @php
                                    $no++;
                                @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#crudTable').DataTable();
        });
    </script>
@endpush
