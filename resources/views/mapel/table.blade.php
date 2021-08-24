@extends('layouts.master')

@section('title')
    Dashboard | Mata Pelajaran Table
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
                    <a href="{{ route('add.lesson') }}" class="btn btn-primary mb-3">
                        + Tambah Kelas Baru
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Mapel</th>
                                <th>Mata Pelajaran</th>
                                <th>Detail Mapel</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($mapels as $mapel)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $mapel->kode_mapel }}</td>
                                        <td>{{ $mapel->mata_pelajaran }}</td>
                                        <td>{{ $mapel->detail_mapel }}</td>
                                        <td>{{ $mapel->kelas->kelas }}</td>
                                        <td style="width: 13%;">
                                            <a href="{{ route('edit.lesson', $mapel->id) }}" class="btn btn-sm btn-warning float-left">Edit</a>
                                            <form action="{{ route('destroy.lesson', $mapel->id)  }}" method="POST">
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
        $(document).ready(function() {
            $('#crudTable').DataTable();
        });
    </script>
@endpush
