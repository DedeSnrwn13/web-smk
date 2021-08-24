@extends('layouts.master')

@section('title')
    Dashboard | Admin Table
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
                    <a href="{{ route('add.pemasukan') }}" class="btn btn-primary mb-3">
                        + Tambah Data Pemasukan Baru
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Pembayaran</th>
                                <th>Cicilan</th>
                                <th>Sisa</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pemasukan as $pem)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pem->tanggal }}</td>
                                        <td>{{ $pem->siswa->nama }}</td>
                                        <td>{{ $pem->kelas->kelas }}</td>
                                        <td>{{ $pem->jurusan->nama }}</td>
                                        <td>{{ $pem->jenis_pembayaran }}</td>
                                        <td>Rp. {{ number_format($pem->cicilan) }}</td>
                                        <td>Rp. {{ number_format($pem->sisa) }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('edit.pemasukan', $pem->id) }}" class="btn btn-sm btn-warning mr-1">Edit</a>
                                            <a href="#" data-id="{{ $pem->id }}" class="btn btn-sm btn-danger confirm-submit ml-1">
                                                <form action="{{ route('destroy.pemasukan', $pem->id)  }}" method="POST" id="delete{{ $pem->id }}">
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
    <!--
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'no_transaksi', name: 'no_transaksi' },
                { data: 'siswa_id', name: 'siswa_id' },
                { data: 'kelas', name: 'kelas' },
                { data: 'jurusan', name: 'jurusan' },
                { data: 'jenis_pembayaran_id', name: 'jenis_pembayaran_id' },
                { data: 'cicilan', name: 'cicilan' },
                { data: 'sisa', name: 'sisa' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
    -->
@endpush
