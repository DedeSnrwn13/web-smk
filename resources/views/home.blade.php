@extends('layouts.app')

@section('content')
    @if (Auth::user()->roles == 'GURU')
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span>Selamat Datang Kembali! Guru {{ Auth::user()->name }} </span>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->roles == 'SISWA')
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span>Selamat Datang Kembali! Murid {{ Auth::user()->name }} </span>
                </div>
            </div>
        </div>
    @endif

@endsection
