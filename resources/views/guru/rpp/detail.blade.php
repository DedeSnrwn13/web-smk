@extends('layouts.app')

@section('title')
    Dashboard | Lampiran RPP
@endsection

@section('content')
<h3>Otomatis Mendownload</h3>
<object data="{{ asset('/storage/lampiran/rpp/'.$rpp->lampiran) }}" width="600" height="400"></object>
@endsection
