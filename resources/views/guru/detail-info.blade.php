@extends('layouts.app')

@section('title')
    Dashboard | Lampiran Informasi
@endsection

@section('content')
<h3>Otomatis Mendownload</h3>
<object data="{{ asset('/storage/lampiran/informasi/'.$info->lampiran) }}" width="600" height="400"></object>
@endsection
