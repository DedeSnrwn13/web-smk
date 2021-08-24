@extends('layouts.master')

@section('title')
    Dashboard | Edit Passsword Admin
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('view.detail.admin', $admin->id) }}" class="btn btn-primary w-20">
        <i class="fas fa-long-arrow-alt-left"></i>
        Kembali
    </a>
    <!-- Section Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mt-4">
                <div class="card-header">
                    Edit Password
                </div>
                <div class="card-body">
                    <form action="{{ route('update.password.admin', $admin->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword" class="col-form-label">Password Baru</label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword">
                                <i class="fas fa-eye" onclick="myFunction()" style="position: absolute; right: 0; margin-right: 25px; cursor: pointer; margin-top: -26px;"></i>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 offset"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mt-1">
                                <button type="submit" class="btn btn-success w-100"><i class="fas fa-pen-square"></i> Update</button>
                            </div>
                            <div class="col-md-9 offset"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function myFunction() {
            var pw1 = document.getElementById("inputPassword");

            if (pw1.type === "password") {
                pw1.type = "text";
            } else {
                pw1.type = "password";
            }
        }
    </script>
@endpush
