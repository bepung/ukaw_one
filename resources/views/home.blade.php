@extends('layouts.app')

@section('content')

<h1>Daftar Berkas &nbsp; <button type="button" class="btn btn-info btn-sm" onclick="window.location='{{ route("berkasUnggah.index") }}'">Tambah</button></h1>
<div class="container ">
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
        <button type="button" class="btn btn-primary btn-sm">Lihat</button>
        <button type="button" class="btn btn-danger btn-sm">Hapus</button> </td>
  </tr>
  @endforeach
    </table>
</div>

    
@endsection
