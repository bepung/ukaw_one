@extends('layouts.app')

@section('content')

@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

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
        <button type="button" class="btn btn-primary btn-sm">Lihat  <span class="glyphicon glyphicon-remove"></span> </button>
        <form method="POST" action="{{ route('berkasUnggah.destroy', $BerkasUnggah->filename)}}" style="display:inline">
          @method('DELETE')
          @csrf
        <button type="submit" class="btn btn-danger btn-sm">Hapus  <span class="glyphicon glyphicon-remove"></span> </button> </td>
      </form>
  </tr>
  @endforeach
    </table>
</div>


@endsection
