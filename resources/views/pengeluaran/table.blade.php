@extends('layouts.master')

@section('title')
    Dashboard | Pengeluatan Table
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
<!-- Section Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('add.pengeluaran') }}" class="btn btn-primary mb-3">
                        + Tambah Data Pengeluaran Baru
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Transaksi</th>
                                <th style="width: 15%;">Tanggal</th>
                                <th>jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @php
                                    $no = 1;
                                @endphp
                                @foreach ($pengeluarans as $peng)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $peng->nama_transaksi }}</td>
                                        <td>{{ $peng->tanggal }}</td>
                                        <td>{{ number_format($peng->jumlah) }}</td>
                                        <td>Rp. {{ number_format($peng->harga) }}</td>
                                        <td>Rp. {{ number_format($peng->total) }}</td>
                                        <td>{{ $peng->keterangan }}</td>
                                        <td style="width: 15%;">
                                            <a href="{{ route('edit.pengeluaran', $peng->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="#" data-id="{{ $peng->id }}" class="btn btn-sm btn-danger confirm-submit">
                                                <form action="{{ route('destroy.pengeluaran', $peng->id) }}" method="POST" id="delete{{ $peng->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(".confirm-submit").click(function(e) {
            var id = e.target.dataset.id;
            Swal.fire({
                title: 'Yakin ingin menghapusnya?',
                text: "Data yang sudah di hapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.value) {
                    $(`#delete${id}`).submit();
                }
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#crudTable').DataTable();
        });
    </script>
@endpush
