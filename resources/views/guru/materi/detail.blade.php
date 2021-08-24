@extends('layouts.app')

@section('title')
    Dashboard | Lampiran Materi
@endsection

@section('content')
<h3>Otomatis Mendownload</h3>
<object data="{{ asset('/storage/lampiran/materi/'.$materi->lampiran) }}" width="600" height="400"></object>
@endsection
