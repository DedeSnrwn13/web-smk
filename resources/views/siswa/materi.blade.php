@extends('layouts.app')

@section('title')
    Dashboard | Materi Pelajaran
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
                                <th>Judul</th>
                                <th>Kelas</th>
                                <th>Mapel</th>
                                <th>Link</th>
                                <th>Lampiran</th>
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
                                        <td><a href="{{ route('view.materi', $mat->id) }}" class="btn btn-sm btn-primary">Download</a></td>
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
