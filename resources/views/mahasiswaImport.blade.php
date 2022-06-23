@extends('layouts.app')

@section('content')

@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <div class="container">
   <!-- <h3 align="center">Data Mahasiswa</h3> -->
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif

   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Data Mahasiswa</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Kota/Kabupaten</th>
        <th>Jurusan</th>
       </tr>
       @foreach($data as $row)
       <tr>
        <td>{{ $row->nim }}</td>
        <td>{{ $row->nama }}</td>
        <td>@php $ag=array_reverse(explode("-", $row->agama)); echo $ag[0]; @endphp</td>
        <td>{{ $row->alamat }}</td>
        <td>{{ $row->kota_kabupaten }}</td>
        <td>@php $jur=array_reverse(explode("-", $row->jurusan)); echo $jur[0]; @endphp </td>
       </tr>
       @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>
@endsection
