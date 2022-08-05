<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MahasiswaExport;
use DB;

class MahasiswaController extends Controller
{
  /**
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
   public static function rowCountByFilename(String $filename){
     $rc = DB::table('mahasiswa_import')->where('filename',$filename)->count();
     return $rc;
   }
  /**
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function writeData(Request $request){
    $jurusan = $request->input('pJurusan');
    $angkatan = $request->input('pAngkatan');
    $pendapatan = $request->input('pPendapatan')!='x'?$request->input('pPendapatan'):'';
    $lulus = $request->input('pLulus')!='x'?$request->input('pLulus'):'';
    $kabupaten = $request->input('pKabupaten')!='x'?$request->input('pKabupaten'):'';

    $kPendapatan = "rata_rata_penghasilan_ayah";
    $kAngkatan = "tahun_angkatan";
    $kLulus = "tahun_lulus";
    $kKabupaten = "kota_kabupaten";
    $wer= array();
    $arJ = array('jurusan','=',$jurusan);
    $arA = array($kAngkatan,'=',$angkatan);
    $arP = array($kPendapatan,'=',$pendapatan);
    $arL = array($kLulus,'=',$lulus);
    $arK = array($kKabupaten,'=',$kabupaten);
    if ($jurusan!='00') array_push($wer,$arJ);
    if ($angkatan!='00')array_push($wer,$arA);
    if ($pendapatan!='00')array_push($wer,$arP);
    if ($lulus!='00')array_push($wer,$arL);
    if ($kabupaten!='00')array_push($wer,$arK);
    $data = DB::table('mahasiswa_import')
    ->where($wer)->orderBy('nim', 'ASC')->get()->toArray();
    MahasiswaExport::truncate();
    $data = collect($data)->map(function($x){ return (array) $x;})->toArray();
    foreach (array_chunk($data,500) as $chunk) {
        DB::table('mahasiswa_export')->insert($chunk);
    }
    $pendapatan=$request->input('pPendapatan');
    $lulus=$request->input('pLulus');
    $kabupaten=$request->input('pKabupaten');
    return redirect()->route('exportDataMahasiswa', [$request]);
      // ->with('j',$jurusan)->with('a',$angkatan)
      // ->with('p',$pendapatan)->with('l',$lulus);
//selesai


    return view('mahasiswaImport')->with('data',$data)
    ->with('rPendapatan',$pendapatan)->with('rJurusan',$jurusan)
    ->with('rAngkatan',$angkatan)->with('rLulus',$lulus)
    ->with('successMsg','export data');

  }
  /**
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function readData(Request $request)
  {
    $jurusan = $request->input('pJurusan');
    $angkatan = $request->input('pAngkatan');
    $pendapatan = $request->input('pPendapatan')!='x'?$request->input('pPendapatan'):'';
    $kabupaten = $request->input('pKabupaten')!='x'?$request->input('pKabupaten'):'';
    $lulus = $request->input('pLulus')!='x'?$request->input('pLulus'):'';
    $kKabupaten = "kota_kabupaten";
    $kPendapatan = "rata_rata_penghasilan_ayah";
    $kAngkatan = "tahun_angkatan";
    $kLulus = "tahun_lulus";
    // dd($request->all());
    $wer= array();
    $arJ = array('jurusan','=',$jurusan);
    $arA = array($kAngkatan,'=',$angkatan);
    $arP = array($kPendapatan,'=',$pendapatan);
    $arK = array($kKabupaten,'=',$kabupaten);
    $arL = array($kLulus,'=',$lulus);
    if ($jurusan!='00') array_push($wer,$arJ);
    if ($angkatan!='00')array_push($wer,$arA);
    if ($pendapatan!='00')array_push($wer,$arP);
    if ($kabupaten!='00')array_push($wer,$arK);
    if ($lulus!='00')array_push($wer,$arL);
    // dd($wer);
    $jmlData = DB::table('mahasiswa_import')
      ->where($wer)->orderBy('nim', 'ASC')->count();
    $limit= 500;
    $data = DB::table('mahasiswa_import')
      ->where($wer)->orderBy('nim', 'ASC')->get()->take($limit);
    $jum = count($data);
    if ($jum<$limit) $limit = $jum;
    $pendapatan=$request->input('pPendapatan');
    $lulus=$request->input('pLulus');
    $kabupaten=$request->input('pKabupaten');
    // dd($lulus);
    if ($jmlData>0)
        return view('mahasiswaImport')->with('data',$data)
        ->with('rPendapatan',$pendapatan)->with('rJurusan',$jurusan)
        ->with('rAngkatan',$angkatan)->with('rLulus',$lulus)
        ->with('rKabupaten',$kabupaten)
        ->with('successMsg','data ditampilkan '.$limit . ' dari total '.$jmlData);
    else
        return view('mahasiswaImport')->with('data',$data)
        ->with('rPendapatan',$pendapatan)->with('rJurusan',$jurusan)
        ->with('rAngkatan',$angkatan)->with('rLulus',$lulus)
        ->with('rKabupaten',$kabupaten)
        ->with('successMsg','data kosong');
  }
  /**
   * @return \Illuminate\Http\Response
   */
  public function allData()
  {
      $tot = DB::table('mahasiswa_import')->orderBy('nim', 'ASC')->count();
      $limit = 500;
      $data = DB::table('mahasiswa_import')->orderBy('nim', 'ASC')->get()->take($limit);
      $jum = count($data);
      if ($jum<$limit) $limit=$jum;
      return view('mahasiswaImport')->with('data',$data)->with('successMsg','Ditampilkan  '.$limit.' data dari '.$tot);
  }
}
