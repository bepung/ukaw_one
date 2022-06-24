@extends('layouts.app')

@section('content')

@if(session()->has('successMsg'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <center>{{ session()->get('successMsg') }}</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if(!empty($successMsg))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <center>{{ $successMsg }}</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


<!-- spinner -->
<section id="loading"><div id="loading-content"></div></section>

@yield('second_content')

@endsection
