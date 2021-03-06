@extends('layouts.alert')

@section('second_content')


<!-- unggah -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script> -->

    <div class="container mt-5">
    <form onsubmit="beginLoad();" action="{{ route('berkasUnggah.store') }}" method="post" enctype="multipart/form-data">
      <h3 align="center">Unggah Berkas Mahasiswa</h3>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <div class="card-title ">
                            <h4>Pilih Berkas Data </h4>
                        </div>
                    </div>

                    <div class="card-body">

                    <!-- print success message after file upload  -->
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            <div class="form-group" {{ $errors->has('file') ? 'has-error' : '' }}>
                                <label for="file"></label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <span class="text-dark text-right"> Ukuran maksimal: 8.500 kilobyte</span></br>
                                    <span class="text-danger"> {{ $errors->first('file') }}</span>
                            </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-md"> Unggah </button>
                            <button type="button" class="btn btn-warning btn-md" onclick="window.location='{{ route("home") }}'"> Batal </button>
                        </div>
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
