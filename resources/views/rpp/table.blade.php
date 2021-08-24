@extends('layouts.master')

@section('title')
    Dashboard | RPP Table
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
                    <a href="{{ route('add.rpp') }}" class="btn btn-primary mb-3">
                        + Tambah RPP Baru
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>KI</th>
                                <th>KD</th>
                                <th>Lampiran</th>
                                <th style="width: 13%;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($rpp as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->guru->nama }}</td>
                                        <td>{{ $item->mapel->mata_pelajaran }}</td>
                                        <td>{{ $item->ki }}</td>
                                        <td>{{ $item->kd }}</td>
                                        <td><a href="{{ route('view.detail.rpp', $item->id) }}" class="btn btn-sm btn-primary">Download</a></td>
                                        <td>
                                            <a href="{{ route('edit.rpp', $item->id) }}" class="btn btn-sm btn-warning float-left">Edit</a>
                                            <form action="{{ route('destroy.rpp', $item->id)  }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger float-right" type="submit">
                                                    Hapus
                                                </button>
                                            </form>
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
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#crudTable').DataTable();
        });
    </script>
@endpush
