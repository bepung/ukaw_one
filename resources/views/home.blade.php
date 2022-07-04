@extends('layouts.alert')

@section('second_content')

<div class="container">
  <h3 class="panel-tittle">Data Berkas Hasil Unggah</h3>
<table class="table table-bordered table-striped table-hover">
  Salin Data akan tersimpan di <a href={{ route('allDataMahasiswa')}}>Data Mahasiswa</a>
  <tr>
      <th>Nomer</th>
      <th>Nama File</th>
      <th>Data Tersimpan</th>
      <th>Aksi</th>
  </tr>
  @foreach($files as $BerkasUnggah)
    @php
      $jumlahDataTersimpan = App\Http\Controllers\MahasiswaController::rowCountByFilename("$BerkasUnggah->filename");
    @endphp
  <tr>
        <td data-th="#">{{ $loop->iteration }}</td>
        <td data-th="Nama File"> {{ $BerkasUnggah->filename }} </td>
        <td data-th="Data Tersimpan"> {{ $jumlahDataTersimpan }} </td>
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
            <button type="submit" class="btn btn-success btn-sm" title="salin data dari berkas ini ke data mahasiswa">Salin Data</button>
          </form>
          @if($jumlahDataTersimpan>0)
          <form onsubmit="beginLoad();" method="POST" action="{{ route('berkasImport.destroy', $BerkasUnggah->filename )}}" style="display:inline">
            @method('DELETE')
            @csrf
            <input type="hidden" name="filenameX" value="{{ $BerkasUnggah->filename}}"/>
            <button type="submit" class="btn btn-warning btn-sm" title="hapus data mahasiwa dari berkas ini">Hapus Data</button>
          </form>
          @else
          <button disabled type="button" class="btn btn-outline-warning btn-sm" title="hapus data mahasiwa dari berkas ini">Hapus Data</button>
          @endif
          <form onsubmit="beginLoad();" method="POST" action="{{ route('berkasUnggah.destroy', $BerkasUnggah->filename )}}" style="display:inline">
            @method('DELETE')
            @csrf
            <input type="hidden" name="filename" value="{{ $BerkasUnggah->filename}}"/>
            <button type="submit" class="btn btn-danger btn-sm" title="hapus berkas ini dari penyimpanan">Hapus Berkas</button>
          </form>
        </td>
  </tr>
  @endforeach
    </table>
</div>

@endsection
