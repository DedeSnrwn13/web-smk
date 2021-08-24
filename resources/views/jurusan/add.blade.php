@extends('layouts.master')

@section('title')
    Dashboard | Tambah Jurusan
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
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

<a href="{{ url('/admin/dashboard/home') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Jurusan</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/major/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="major_search">Kode Jurusan <span class="text-danger">*</span></label>
                                {{-- <input name="kode_jurusan" type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" value="{{ old('kode_jurusan') }}" id="kode_jurusan" placeholder="Input Kode Jurusan"> --}}
                                <input type="text" id="major_search" class="form-control" name="kode_jurusan">
                                @error('kode_jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kode_jurusan') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_jurusan">Nama <span class="text-danger">*</span></label>
                                {{-- <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" placeholder="Input Nama Jurusan"> --}}
                                <input type="text" id="nama_jurusan" class="form-control" name="nama" readonly>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo Jurusan </label>
                                <input name="logo" type="file" class="form-control @error('logo') is-invalid @enderror" id="logo">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Input Deskripsi Jurusan"></textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Submit</button>
                </form>
            </div>
		</div>
	</div>
</div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script>
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function(){
            $( "#major_search" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                            url:"{{route('getMajor')}}",
                            type: 'post',
                            dataType: "json",
                            data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                            success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#major_search').val(ui.item.label); // display the selected text
                    $('#nama_jurusan').val(ui.item.value); // save selected id to input

                    return false;
                }
            });
        });
    </script>
@endpush
