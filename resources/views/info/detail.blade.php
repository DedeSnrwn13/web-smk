@extends('layouts.master')

@section('title')
    Dashboard | Detail Informasi
@endsection

@section('content')
<h3>Otomatis Mendownload</h3>
<object data="{{ asset('/storage/lampiran/info/'.$info->lampiran) }}" width="600" height="400"></object>
@endsection
