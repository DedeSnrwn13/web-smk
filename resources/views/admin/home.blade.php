@extends('layouts.master')

@section('title')
    Dashboard | Home Admin
@endsection

@section('content')
    <div class="row my-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-users-cog" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-md-10 d-flex align-items-center">
                            <span>Jumlah Admin <br> <b>{{ number_format($admin) }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-chalkboard-teacher" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-md-10 d-flex align-items-center">
                            <span>Jumlah Guru <br> <b>{{ number_format($guru) }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-graduate" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-md-10 d-flex align-items-center">
                            <span>Jumlah Siswa <br> <b>{{ number_format($siswa) }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-md-10 d-flex align-items-center">
                            <span>Users in Web <br> <b>{{ number_format($roles) }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-md-10 d-flex align-items-center">
                            <span>Jumlah Bendahara <br> <b>{{ $bendahara }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-chart-line" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-md-10 d-flex align-items-center">
                            <span>Jumlah Pemasukan <br> <b>{{ number_format($pemasukan) }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-sort-amount-down-alt" style="font-size: 30px;"></i>
                        </div>
                        <div class="col-md-10 d-flex align-items-center">
                            <span>Jumlah Pengeluaran <br> <b>{{ number_format($pengeluaran) }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

