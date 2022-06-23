@extends('layouts.app')

@section('content')

@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif
<!-- spinner --> <section id="loading"><div id="loading-content"></div></section>
  <!-- <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='{{ route("berkasImport.show", "0" )}}'">Lihat Data</button> -->
  <!-- <button type="button" class="btn btn-info btn-sm" onclick="window.location='{{ route("berkasUnggah.index") }}'">Tambah Berkas</button> -->
<div class="container">
  <h3 class="panel-tittle">Data Berkas</h3>
<table class="table table-bordered table-striped table-hover">
  <tr>
      <th>Nomer</th>
      <th>Nama File</th>
      <th>User</th>
      <th>Aksi</th>
  </tr>
  @foreach($files as $BerkasUnggah)
  <tr>
        <td data-th="#">{{ $loop->iteration }}</td>
        <td data-th="Nama File"> {{ $BerkasUnggah->filename }} </td>
        <td data-th="User"> {{ $BerkasUnggah->username }} </td>
        <td data-th="Aksi">
          <?php
          // <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='{{ route("berkasImportStore",  ['filename'=>$BerkasUnggah->filename]) }}'">Rekam</button>
          // <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='{{ route("berkasUnggah.destroy",  $BerkasUnggah->filename) }}'">Hapus</button>
          ?>
          <!-- <button onclick="beginLoad();" type="button" class="btn btn-info btn-sm" >Lihat</button> -->
          <form onsubmit="beginLoad();" method="POST" action="{{ route('berkasImport.store') }}" style="display:inline">
            @method('POST')
            @csrf
            <input type="hidden" name="filename" value="{{ $BerkasUnggah->filename}}"/>
          <button type="submit" class="btn btn-success btn-sm">Salin Data</button>
          </form>
          <form onsubmit="beginLoad();" method="POST" action="{{ route('berkasUnggah.destroy', $BerkasUnggah->filename )}}" style="display:inline">
            @method('DELETE')
            @csrf
            <input type="hidden" name="filename" value="{{ $BerkasUnggah->filename}}"/>
          <button type="submit" class="btn btn-danger btn-sm">Hapus Berkas</button>
          </form>
        </td>
  </tr>
  @endforeach
    </table>
</div>

@endsection
