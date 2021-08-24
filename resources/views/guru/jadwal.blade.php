@extends('layouts.app')

@section('title')
    Dashboard | Jadwal Pelajaran Table
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
                                <th>NO</th>
                                <th>Semester</th>
                                <th>Tahun</th>
                                <th>Kelas</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajara</th>
                                <th>Jam Pelajaran</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($jadwal as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->semester }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->kelas->kelas }}</td>
                                        <td>{{ $item->guru->nama }}</td>
                                        <td>{{ $item->mapel->mata_pelajaran }}</td>
                                        <td>{{ $item->jam }}</td>
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
        $(document).ready(function() {
            $('#crudTable').DataTable();
        });
    </script>
@endpush
