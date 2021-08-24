@extends('layouts.app')

@section('title')
    Dashboard | Mata Pelajaran Table
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
                                <th>Kode Mata Pelajaran</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Keterangan Mata Pelajaran</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($mapel as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->kode_mapel }}</td>
                                        <td>{{ $item->mata_pelajaran }}</td>
                                        <td>{{ $item->kelas->kelas }}</td>
                                        <td>{{ $item->detail_mapel }}</td>
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
