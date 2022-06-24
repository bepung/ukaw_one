@extends('layouts.app')

@section('content')
<div class="alert alert-dark alert-dismissible fade show" role="alert">
  <center> session()->get('success') </center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>


  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<!-- striped table -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- drop down jurusan begin -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<!-- <script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<!-- drop down jurusan end -->
  <div class="container">
   <h3 align="left">Data Mahasiswa</h3>
   <div class="panel panel-default">
     <!-- nav 2 -->
     <nav class="navbar navbar-expand-lg">
              <form class="navbar-form pull-left">
                <span class="navbar-text">Jurusan</span>
                <select name="" id="" class="form-control" style="width: 200px;display:inline">
                  <option value="00">Semua Jurusan</option>
                  <option value='49-Teologi'>49-Teologi</option>
                  <option value='50-Pendidikan Biologi'>50-Pendidikan Biologi</option>
                  <option value='51-Teologi Agama Kristen'>51-Teologi Agama Kristen</option>
                  <option value='52-Teknologi Hasil Perikanan'>52-Teknologi Hasil Perikanan</option>
                  <option value='53-Manajemen Sumber Daya Perairan'>53-Manajemen Sumber Daya Perairan</option>
                  <option value='54-Ilmu Hukum'>54-Ilmu Hukum</option>
                  <option value='55-Mekanisasi Pertanian'>55-Mekanisasi Pertanian</option>
                  <option value='56-Teknologi Hasil Pertanian'>56-Teknologi Hasil Pertanian</option>
                  <option value='57-Pendidikan Bahasa Inggris'>57-Pendidikan Bahasa Inggris</option>
                  <option value='58-Pendidikan Jasmani, Kesehatan Dan Rekreasi'>58-Pendidikan Jasmani, Kesehatan Dan Rekreasi</option>
                  <option value='59-Ilmu Pendidikan Teologi'>59-Ilmu Pendidikan Teologi</option>
                  <option value='60-Akuntansi'>60-Akuntansi</option>
                  <option value='61-Kepemimpinan Kristen'>61-Kepemimpinan Kristen</option>
                  <option value='62-Manajemen'>62-Manajemen</option>
                </select>
                <span class="navbar-text">Angkatan</span>
                <select name="" id="" class="form-control" style="width: 200px;display:inline">
                  <option value="00">Semua Angkatan</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                </select>
                <button type="submit" class="btn btn-primary">Baca Data</button>
              </form>
     </nav>
     <!-- nav 2 end -->
    <div class="panel-heading">
      <div class="dropdown">
      <h3 class="panel-title">
        Data Mahasiswa
       <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Pilih Jurusan
       </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         <a class="dropdown-item" href="{{ route('berkasImport.show','49-Teologi') }}">49-Teologi</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','50-Pendidikan Biologi') }}">50-Pendidikan Biologi</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','51-Teologi Agama Kristen') }}">51-Teologi Agama Kristen</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','52-Teknologi Hasil Perikanan') }}">52-Teknologi Hasil Perikanan</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','53-Manajemen Sumber Daya Perairan') }}">53-Manajemen Sumber Daya Perairan</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','54-Ilmu Hukum') }}">54-Ilmu Hukum</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','55-Mekanisasi Pertanian') }}">55-Mekanisasi Pertanian</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','56-Teknologi Hasil Pertanian') }}">56-Teknologi Hasil Pertanian</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','57-Pendidikan Bahasa Inggris') }}">57-Pendidikan Bahasa Inggris</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','58-Pendidikan Jasmani, Kesehatan Dan Rekreasi') }}">58-Pendidikan Jasmani, Kesehatan Dan Rekreasi</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','59-Ilmu Pendidikan Teologi') }}">59-Ilmu Pendidikan Teologi</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','60-Akuntansi') }}">60-Akuntansi</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','61-Kepemimpinan Kristen') }}">61-Kepemimpinan Kristen</a>
         <a class="dropdown-item" href="{{ route('berkasImport.show','62-Manajemen') }}">62-Manajemen</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="{{ route('berkasImport.show','00') }}">Semua Jurusan</a>
       </div>
     </h3>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive m-4">
      <table class="table table-striped table-hover table-light">
       <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Kota/Kabupaten</th>
        <th>Jurusan</th>
       </tr>
      </table>
     </div>
    </div>
   </div>
  </div>
@endsection
