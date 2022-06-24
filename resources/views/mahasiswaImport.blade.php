@extends('layouts.alert')

@section('second_content')

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
              <form method="POST" class="navbar-form pull-left" action="{{ route('readDataMahasiswa') }}">
@method('POST')
@csrf
                <span class="navbar-text">Jurusan</span>
                <select name="pJurusan" id="pJurusan" class="form-control" style="width: 200px;display:inline">
                  <option value='00' @php if(!empty($rJurusan)) if ($rJurusan=='00') echo 'selected' @endphp>Semua jurusan</option>
                  <option value='49-Teologi' @php if(!empty($rJurusan)) if ($rJurusan=='49-Teologi') echo 'selected' @endphp>49-Teologi</option>
                  <option value='50-Pendidikan Biologi' @php if(!empty($rJurusan)) if ($rJurusan=='50-Pendidikan Biologi') echo 'selected' @endphp>50-Pendidikan Biologi</option>
                  <option value='51-Teologi Agama Kristen' @php if(!empty($rJurusan)) if ($rJurusan=='51-Teologi Agama Kristen') echo 'selected' @endphp>51-Teologi Agama Kristen</option>
                  <option value='52-Teknologi Hasil Perikanan' @php if(!empty($rJurusan)) if ($rJurusan=='52-Teknologi Hasil Perikanan') echo 'selected' @endphp>52-Teknologi Hasil Perikanan</option>
                  <option value='53-Manajemen Sumber Daya Perairan' @php if(!empty($rJurusan)) if ($rJurusan=='53-Manajemen Sumber Daya Perairan') echo 'selected' @endphp>53-Manajemen Sumber Daya Perairan</option>
                  <option value='54-Ilmu Hukum' @php if(!empty($rJurusan)) if ($rJurusan=='54-Ilmu Hukum') echo 'selected' @endphp>54-Ilmu Hukum</option>
                  <option value='55-Mekanisasi Pertanian' @php if(!empty($rJurusan)) if ($rJurusan=='55-Mekanisasi Pertanian') echo 'selected' @endphp>55-Mekanisasi Pertanian</option>
                  <option value='56-Teknologi Hasil Pertanian' @php if(!empty($rJurusan)) if ($rJurusan=='56-Teknologi Hasil Pertanian') echo 'selected' @endphp>56-Teknologi Hasil Pertanian</option>
                  <option value='57-Pendidikan Bahasa Inggris' @php if(!empty($rJurusan)) if ($rJurusan=='57-Pendidikan Bahasa Inggris') echo 'selected' @endphp>57-Pendidikan Bahasa Inggris</option>
                  <option value='58-Pendidikan Jasmani, Kesehatan Dan Rekreasi' @php if(!empty($rJurusan)) if ($rJurusan=='58-Pendidikan Jasmani, Kesehatan Dan Rekreasi') echo 'selected' @endphp>58-Pendidikan Jasmani, Kesehatan Dan Rekreasi</option>
                  <option value='59-Ilmu Pendidikan Teologi' @php if(!empty($rJurusan)) if ($rJurusan=='59-Ilmu Pendidikan Teologi') echo 'selected' @endphp>59-Ilmu Pendidikan Teologi</option>
                  <option value='60-Akuntansi' @php if(!empty($rJurusan)) if ($rJurusan=='60-Akuntansi') echo 'selected' @endphp>60-Akuntansi</option>
                  <option value='61-Kepemimpinan Kristen' @php if(!empty($rJurusan)) if ($rJurusan=='61-Kepemimpinan Kristen') echo 'selected' @endphp>61-Kepemimpinan Kristen</option>
                  <option value='62-Manajemen' @php if(!empty($rJurusan)) if ($rJurusan=='62-Manajemen') echo 'selected' @endphp>62-Manajemen</option>
                </select>
                <span class="navbar-text pl-2">Angkatan</span>
                <select name="pAngkatan" id="pAngkatan" class="form-control" style="width: 200px;display:inline">
                  <option value='00' @php if(!empty($rAngkatan)) if ($rAngkatan=='00') echo 'selected' @endphp>Semua angkatan</option>
                  <option value='2021' @php if(!empty($rAngkatan)) if ($rAngkatan=='2021') echo 'selected' @endphp>Angkatan 2021</option>
                  <option value='2020' @php if(!empty($rAngkatan)) if ($rAngkatan=='2020') echo 'selected' @endphp>Angkatan 2020</option>
                  <option value='2019' @php if(!empty($rAngkatan)) if ($rAngkatan=='2019') echo 'selected' @endphp>Angkatan 2019</option>
                  <option value='2018' @php if(!empty($rAngkatan)) if ($rAngkatan=='2018') echo 'selected' @endphp>Angkatan 2018</option>
                  <option value='2017' @php if(!empty($rAngkatan)) if ($rAngkatan=='2017') echo 'selected' @endphp>Angkatan 2017</option>
                  <option value='2016' @php if(!empty($rAngkatan)) if ($rAngkatan=='2016') echo 'selected' @endphp>Angkatan 2016</option>
                  <option value='2015' @php if(!empty($rAngkatan)) if ($rAngkatan=='2015') echo 'selected' @endphp>Angkatan 2015</option>
                  <option value='2014' @php if(!empty($rAngkatan)) if ($rAngkatan=='2014') echo 'selected' @endphp>Angkatan 2014</option>
                  <option value='2013' @php if(!empty($rAngkatan)) if ($rAngkatan=='2013') echo 'selected' @endphp>Angkatan 2013</option>
                  <option value='2012' @php if(!empty($rAngkatan)) if ($rAngkatan=='2012') echo 'selected' @endphp>Angkatan 2012</option>
                  <option value='2011' @php if(!empty($rAngkatan)) if ($rAngkatan=='2011') echo 'selected' @endphp>Angkatan 2011</option>
                  <option value='2010' @php if(!empty($rAngkatan)) if ($rAngkatan=='2010') echo 'selected' @endphp>Angkatan 2010</option>
                  <option value='2009' @php if(!empty($rAngkatan)) if ($rAngkatan=='2009') echo 'selected' @endphp>Angkatan 2009</option>
                  <option value='2008' @php if(!empty($rAngkatan)) if ($rAngkatan=='2008') echo 'selected' @endphp>Angkatan 2008</option>
                  <option value='2007' @php if(!empty($rAngkatan)) if ($rAngkatan=='2007') echo 'selected' @endphp>Angkatan 2007</option>
                  <option value='2006' @php if(!empty($rAngkatan)) if ($rAngkatan=='2006') echo 'selected' @endphp>Angkatan 2006</option>
                  <option value='2005' @php if(!empty($rAngkatan)) if ($rAngkatan=='2005') echo 'selected' @endphp>Angkatan 2005</option>
                  <option value='2004' @php if(!empty($rAngkatan)) if ($rAngkatan=='2004') echo 'selected' @endphp>Angkatan 2004</option>
                  <option value='2002' @php if(!empty($rAngkatan)) if ($rAngkatan=='2002') echo 'selected' @endphp>Angkatan 2002</option>
                  <option value='2000' @php if(!empty($rAngkatan)) if ($rAngkatan=='2000') echo 'selected' @endphp>Angkatan 2000</option>
                  <option value='1996' @php if(!empty($rAngkatan)) if ($rAngkatan=='1996') echo 'selected' @endphp>Angkatan 1996</option>
                </select>
                <span class="navbar-text pl-2">Tahun lulus</span>
                <select name="pLulus" id="pLulus" class="form-control" style="width: 200px;display:inline">
                  <option value='00' @php if(!empty($rLulus)) if ($rLulus=='00') echo 'selected' @endphp>Semua data</option>
                  <option value='2020' @php if(!empty($rLulus)) if ($rLulus=='2020') echo 'selected' @endphp>2020</option>
                  <option value='2019' @php if(!empty($rLulus)) if ($rLulus=='2019') echo 'selected' @endphp>2019</option>
                  <option value='2018' @php if(!empty($rLulus)) if ($rLulus=='2018') echo 'selected' @endphp>2018</option>
                  <option value='2017' @php if(!empty($rLulus)) if ($rLulus=='2017') echo 'selected' @endphp>2017</option>
                  <option value='2016' @php if(!empty($rLulus)) if ($rLulus=='2016') echo 'selected' @endphp>2016</option>
                  <option value='2015' @php if(!empty($rLulus)) if ($rLulus=='2015') echo 'selected' @endphp>2015</option>
                  <option value='2014' @php if(!empty($rLulus)) if ($rLulus=='2014') echo 'selected' @endphp>2014</option>
                  <option value='2013' @php if(!empty($rLulus)) if ($rLulus=='2013') echo 'selected' @endphp>2013</option>
                  <option value='2012' @php if(!empty($rLulus)) if ($rLulus=='2012') echo 'selected' @endphp>2012</option>
                  <option value='2011' @php if(!empty($rLulus)) if ($rLulus=='2011') echo 'selected' @endphp>2011</option>
                  <option value='2010' @php if(!empty($rLulus)) if ($rLulus=='2010') echo 'selected' @endphp>2010</option>
                  <option value='2000' @php if(!empty($rLulus)) if ($rLulus=='2000') echo 'selected' @endphp>2000</option>
                  <option value='x' @php if(!empty($rLulus)) if ($rLulus=='x') echo 'selected' @endphp>--- belum lulus ---</option>
                </select>
                <br/>
                <span class="navbar-text">Pendapatan Orang Tua</span>
                <select name="pPendapatan" id="pPendapatan" class="form-control mt-3" style="width: 200px;display:inline">
                  <option value='00' @php if(!empty($rPendapatann)) if ($rPendapatann=='00') echo 'selected' @endphp>Semua data</option>
                  <option value='0 s.d 0' @php if(!empty($rPendapatan)) if ($rPendapatan=='0 s.d 0') echo 'selected' @endphp>0 s.d 0</option>
                  <option value='0 s.d 20.000.001' @php if(!empty($rPendapatan)) if ($rPendapatan=='0 s.d 20.000.001') echo 'selected' @endphp>0 s.d 20.000.001</option>
                  <option value='20.000.000 s.d 5.000.000' @php if(!empty($rPendapatan)) if ($rPendapatan=='20.000.000 s.d 5.000.000') echo 'selected' @endphp>20.000.000 s.d 5.000.000</option>
                  <option value='4.999.999 s.d 2.000.000' @php if(!empty($rPendapatan)) if ($rPendapatan=='4.999.999 s.d 2.000.000') echo 'selected' @endphp>4.999.999 s.d 2.000.000</option>
                  <option value='1.999.999 s.d 1.000.000' @php if(!empty($rPendapatan)) if ($rPendapatan=='1.999.999 s.d 1.000.000') echo 'selected' @endphp>1.999.999 s.d 1.000.000</option>
                  <option value='999.999 s.d 500.000' @php if(!empty($rPendapatan)) if ($rPendapatan=='999.999 s.d 500.000') echo 'selected' @endphp>999.999 s.d 500.000</option>
                  <option value='499.999 s.d 0' @php if(!empty($rPendapatan)) if ($rPendapatan=='499.999 s.d 0') echo 'selected' @endphp>499.999 s.d 0</option>
                  <option value='x' @php if(!empty($rPendapatan)) if ($rPendapatan=='x') echo 'selected' @endphp>--- tidak diisi ---</option>
                </select>
                <span class="navbar-text pl-5"> </span><button type="submit" class="btn btn-primary btn-lg pt-0 mt-0">Tampilkan Data</button>
                @if(!empty($rJurusan) || !empty($rAngkatan) || !empty($rPendapatan) || !empty($rLulus))
                <button onclick="event.preventDefault(); document.getElementById('export-form').submit();" type="button" class="btn btn-success btn-lg pt-0 mt-0">Export Data</button>
                @else
                <button type="button" disabled="disabled"  class="btn btn-outline-success btn-lg pt-0 mt-0">Export Data</button>
                @endif
              </form>
     </nav>
     <!-- nav 2 end -->
    <div class="panel-heading">

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
  @if(!empty($rJurusan) || !empty($rAngkatan) || !empty($rPendapatan) || !empty($rLulus))
  <form id="export-form" action="{{ route('writeDataMahasiswa') }}" method="POST" style="display: none;">
      @method('POST')
      <input type="hidden" name="pJurusan" id="pJurusan" value="@if (!empty($rJurusan)){{$rJurusan}}@endif">
      <input type="hidden" name="pAngkatan" id="pAngkatan" value="@if (!empty($rAngkatan)){{$rAngkatan}}@endif">
      <input type="hidden" name="pLulus" id="pLulus" value="@if (!empty($rLulus)){{$rLulus}}@endif">
      <input type="hidden" name="pPendapatan" id="pPendapatan" value="@if (!empty($rPendapatan)){{$rPendapatan}}@endif">
      @csrf
  </form>
  @endif
@endsection
