@extends('layouts.master')

@section('title')
    Dashboard | Tambah Jadwal Pelajaran
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
                    <a href="{{ route('add.jadwal') }}" class="btn btn-primary mb-3">
                        + Tambah Jadwal Baru
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Semester</th>
                                <th>Tahun Ajar</th>
                                <th>Kelas</th>
                                <th>Mapel</th>
                                <th>Jam</th>
                                <th>Guru</th>
                                <th style="width: 13%;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no =1;
                                @endphp
                                @foreach ($jadwal as $jad)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $jad->semester }}</td>
                                        <td>{{ $jad->tahun }}</td>
                                        <td>{{ $jad->kelas->kelas }}</td>
                                        <td>{{ $jad->mapel->mata_pelajaran }}</td>
                                        <td>{{ $jad->jam }}</td>
                                        <td>{{ $jad->guru->nama }}</td>
                                        <td>
                                            <a href="{{ route('edit.jadwal', $jad->id) }}" class="btn btn-sm btn-warning float-left">Edit</a>
                                            <form action="{{ route('destroy.jadwal', $jad->id)  }}" method="POST">
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
