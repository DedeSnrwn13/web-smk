@extends('layouts.master')

@section('title')
    Dashboard | Materi Pelajran
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
                    <a href="{{ route('add.materi') }}" class="btn btn-primary mb-3">
                        + Tambah Materi Baru
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kelas</th>
                                <th>Mapel</th>
                                <th>Link</th>
                                <th>Lampiran</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($materi as $mat)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $mat->judul }}</td>
                                        <td>{{ $mat->kelas->kelas }}</td>
                                        <td>{{ $mat->mapel->mata_pelajaran }}</td>
                                        <td><a href="{{ $mat->link }}">{{ $mat->link }}</a></td>
                                        <td><a href="{{ route('view.detail.materi', $mat->id) }}" class="btn btn-sm btn-primary">Download</a></td>
                                        <td style="width: 13%;">
                                            <a href="{{ route('edit.materi', $mat->id) }}" class="btn btn-sm btn-warning float-left">Edit</a>
                                            <form action="{{ route('destroy.materi', $mat->id)  }}" method="POST">
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
        $(document).ready(function () {
            $('#crudTable').DataTable();
        });
    </script>
@endpush
