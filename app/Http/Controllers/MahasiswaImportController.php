<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MahasiswaImport\MahasiswaImportToModelImport;
use App\Imports\MahasiswaImport\MahasiswaImportToCollectionImport;
use App\Imports\Mahasiswa\MahasiswaToModelImport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

use DB;


class MahasiswaImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return redirect()->route('home')->with("successMsg", 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         $name = public_path('/uploads/') . $request->filename;
         try {
            // $data = Excel::import(new MahasiswaImportToModelImport,$name);
            $data = Excel::toArray(new MahasiswaImportToModelImport,$name);
            $data=$data[0];
            $dataX = array();
            // dd($data);
            foreach ($data as $row) {
              $dat = array([
                'id' => "'" .  isset($row['id'])?$row['id']:'' . "'",
                'nim' => "'" .  isset($row['nim'])?$row['nim']:'' . "'",
                'nama' => "'" .  isset($row['nama'])?$row['nama']:'' . "'",
                'alamat' => "'" .  isset($row['alamat'])?$row['alamat']:'' . "'",
                'telp' => "'" .  isset($row['telp'])?$row['telp']:'' . "'",
                'email' => "'" .  isset($row['email'])?$row['email']:'' . "'",
                'tahun_angkatan' => "'" .  isset($row['tahunangkatan'])?$row['tahunangkatan']:'' . "'",

                'angkatan' => "'" .  isset($row['nim'])?substr($row['nim'],0,2):'' . "'",

                'tanggal_masuk' => "'" .  isset($row['tanggalmasuk'])?$row['tanggalmasuk']:'' . "'",
                'tempat_lahir' => "'" .  isset($row['tempatlahir'])?$row['tempatlahir']:'' . "'",
                'tanggal_lahir' => "'" .  isset($row['tanggallahir'])?$row['tanggallahir']:'' . "'",
                'tanggal_lahir_manual' => "'" .  isset($row['tanggallahirmanual'])?$row['tanggallahirmanual']:'' . "'",
                'kelamin' => "'" .  isset($row['kelamin'])?$row['kelamin']:'' . "'",
                'jurusan' => "'" .  isset($row['jurusan'])?$row['jurusan']:'' . "'",
                'konsentrasi' => "'" .  isset($row['konsentrasi'])?$row['konsentrasi']:'' . "'",
                'jenjang' => "'" .  isset($row['jenjang'])?$row['jenjang']:'' . "'",
                'semester_mulai' => "'" .  isset($row['semestermulai'])?$row['semestermulai']:'' . "'",
                'program' => "'" .  isset($row['program'])?$row['program']:'' . "'",
                'agama' => "'" .  isset($row['agama'])?$row['agama']:'' . "'",
                'warganegara' => "'" .  isset($row['warganegara'])?$row['warganegara']:'' . "'",
                'negara' => "'" .  isset($row['negara'])?$row['negara']:'' . "'",
                'status_awal_mahasiswa' => "'" .  isset($row['statusawalmahasiswa'])?$row['statusawalmahasiswa']:'' . "'",
                'merupakan_pindahan' => isset($row['merupakanpindahan'])?($row['merupakanpindahan']=='true'?1:0):0,
                'pindahan_dari_kampus' => "'" .  isset($row['pindahandarikampus'])?$row['pindahandarikampus']:'' . "'",
                'nama_prodi_pindah' => "'" .  isset($row['namaprodipindah'])?$row['namaprodipindah']:'' . "'",
                'nim_pindahan' => "'" .  isset($row['nimpindahan'])?$row['nimpindahan']:'' . "'",
                'pindah_dari_kampus_lama_di_semester' => isset($row['pindahdarikampuslamadisemester'])?$row['pindahdarikampuslamadisemester']:'',
                'pindah_ke_kampus_ini_masuk_semester' => isset($row['pindahkekampusinimasuksemester'])?$row['pindahkekampusinimasuksemester']:'',
                'tanggal_pindah' => "'" .  isset($row['tanggalpindah'])?$row['tanggalpindah']:'' . "'",
                'sks_yang_diakui' => isset($row['sksyangdiakui'])?$row['sksyangdiakui']:'',
                'keterangan_pindah' => "'" .  isset($row['keteranganpindah'])?$row['keteranganpindah']:'' . "'",
                'merupakan_alih_prodi' => isset($row['merupakanalihprodi'])?($row['merupakanalihprodi']=='true'?1:0):'',
                'nim_lama_sebelum_pindah' => "'" .  isset($row['nimlamasebelumpindah'])?$row['nimlamasebelumpindah']:'' . "'",
                'sks_yang_diakui_pindah_prodi' => isset($row['sksyangdiakuipindahprodi'])?$row['sksyangdiakuipindahprodi']:'',
                'pindah_ke_prodi_ini_masuk_semester' => isset($row['pindahkeprodiinimasuksemester'])?$row['pindahkeprodiinimasuksemester']:'',
                'tanggal_pindah_prodi' => "'" .  isset($row['tanggalpindahprodi'])?$row['tanggalpindahprodi']:'' . "'",
                'keterangan_pindah_prodi' => "'" .  isset($row['keteranganpindahprodi'])?$row['keteranganpindahprodi']:'' . "'",
                'status_keluar' => "'" .  isset($row['statuskeluar'])?$row['statuskeluar']:'' . "'",
                'no_ijazah_1' => "'" .  isset($row['noijazah1'])?$row['noijazah1']:'' . "'",
                'no_ijazah_2' => "'" .  isset($row['noijazah2'])?$row['noijazah2']:'' . "'",
                // 'no_akta_1' => isset($row['noakta1'])?$row['noakta1']:'',
                // 'no_akta_2' => isset($row['noakta2'])?$row['noakta2']:'',
                'tahun_wisuda' => "'" .  isset($row['tahunwisuda'])?$row['tahunwisuda']:'' . "'",
                'tahun_lulus' => "'" .  isset($row['tahunlulus'])?$row['tahunlulus']:'' . "'",
                'semester_lulus' => "'" .  isset($row['semesterlulus'])?$row['semesterlulus']:'' . "'",
                'tanggal_lulus' => "'" .  isset($row['tanggallulus'])?$row['tanggallulus']:'' . "'",
                'tanggal_yudisium' => "'" .  isset($row['tanggalyudisium'])?$row['tanggalyudisium']:'' . "'",
                'tanggal_sk_rektor' => "'" .  isset($row['tanggalskrektor'])?$row['tanggalskrektor']:'' . "'",
                'judul_skripsi' => "'" .  isset($row['judulskripsi'])?$row['judulskripsi']:'' . "'",
                'predikat_kelulusan' => "'" .  isset($row['predikatkelulusan'])?$row['predikatkelulusan']:'' . "'",
                'beasiswa_mahasiswa_miskin' => "'" .  isset($row['beasiswamahasiswamiskin'])?$row['beasiswamahasiswamiskin']:'' . "'",
                'beasiswa_bidik_misi' => "'" .  isset($row['beasiswabidikmisi'])?$row['beasiswabidikmisi']:'' . "'",
                'beasiswa_lain' => "'" .  isset($row['beasiswalain'])?$row['beasiswalain']:'' . "'",
                // 'facebookid' => isset($row['facebookid'])?$row['facebookid']:'',
                // 'google_id' => isset($row['googleid'])?$row['googleid']:'',
                // 'twitter_id' => isset($row['twitterid'])?$row['twitterid']:'',
                // 'linkedin_id' => isset($row['linkedinid'])?$row['linkedinid']:'',
                'jenis_seleksi' => "'" .  isset($row['jenisseleksi'])?$row['jenisseleksi']:'' . "'",
                'jenis_pembiayaan_mahasiswa' => "'" .  isset($row['jenispembiayaanmahasiswa'])?$row['jenispembiayaanmahasiswa']:'' . "'",
                // 'username_ojs' => isset($row['usernameojs'])?$row['usernameojs']:'',
                // 'status_setelah_lulus' => isset($row['statussetelahlulus'])?$row['statussetelahlulus']:'',

                // 'status_domisili_setelah_lulus' => isset($row['statusdomisilisetelahlulus'])?$row['statusdomisilisetelahlulus']:'',
                // 'feeder' => isset($row['feeder'])?$row['feeder']:'',
                // 'idregpd' => isset($row['idregpd'])?$row['idregpd']:'',
                // 'lock_id' => isset($row['lockid'])?$row['lockid']:'',
                // 'token' => isset($row['token'])?$row['token']:'',
                // 'masa_studi' => isset($row['masastudi'])?$row['masastudi']:'',
                // 'link_validasi_eksternal' => isset($row['linkvalidasieksternal'])?$row['linkvalidasieksternal']:'',
                // 'nomor_skpi' => isset($row['nomorskpi'])?$row['nomorskpi']:'',
                // 'id_finger' => isset($row['idfinger'])?$row['idfinger']:'',
                'dosen_pa' => "'" .  isset($row['dosen_pa'])?$row['dosen_pa']:'' . "'",
                'kelas' => "'" .  isset($row['kelas'])?$row['kelas']:'' . "'",
                'nomor_ktp' => "'" .  isset($row['nomor_ktp'])?$row['nomor_ktp']:'' . "'",
                'nama_ayah' => "'" .  isset($row['nama_ayah'])?$row['nama_ayah']:'' . "'",
                'tanggal_lahir_ayah' => "'" .  isset($row['tanggal_lahir_ayah'])?$row['tanggal_lahir_ayah']:'' . "'",
                'jenis_pekerjaan_ayah' => "'" .  isset($row['jenis_pekerjaan_ayah'])?$row['jenis_pekerjaan_ayah']:'' . "'",
                'rata_rata_penghasilan_ayah' => "'" .  isset($row['rata_rata_penghasilan_ayah'])?$row['rata_rata_penghasilan_ayah']:'' . "'",
                'jenjang_pendidikan_ayah' => "'" .  isset($row['jenjang_pendidikan_ayah'])?$row['jenjang_pendidikan_ayah']:'' . "'",
                'nama_ibu' => "'" .  isset($row['nama_ibu'])?$row['nama_ibu']:'' . "'",
                'tanggal_lahir_ibu' => "'" .  isset($row['tanggal_lahir_ibu'])?$row['tanggal_lahir_ibu']:'' . "'",
                'jenis_pekerjaan_ibu' => "'" .  isset($row['jenis_pekerjaan_ibu'])?$row['jenis_pekerjaan_ibu']:'' . "'",
                'rata_rata_penghasilan_ibu' => "'" .  isset($row['rata_rata_penghasilan_ibu'])?$row['rata_rata_penghasilan_ibu']:'' . "'",
                'jenjang_pendidikan_ibu' => "'" .  isset($row['jenjang_pendidikan_ibu'])?$row['jenjang_pendidikan_ibu']:'' . "'",
                'telp_rumah' => "'" .  isset($row['telp_rumah'])?$row['telp_rumah']:'' . "'",
                'hp' => "'" .  isset($row['hp'])?$row['hp']:'' . "'",
                'status' => "'" .  isset($row['status'])?$row['status']:'' . "'",
                'nomor_ktp_ayah' => "'" .  isset($row['nomor_ktp_ayah'])?$row['nomor_ktp_ayah']:'' . "'",
                'nomor_ktp_ibu' => "'" .  isset($row['nomor_ktp_ibu'])?$row['nomor_ktp_ibu']:'' . "'",
                'npsn' => "'" .  isset($row['npsn_nomor_pokok_sekolah_nasional'])?$row['npsn_nomor_pokok_sekolah_nasional']:'' . "'",
                'asal_pendidikan' => "'" .  isset($row['asal_pendidikan'])?$row['asal_pendidikan']:'' . "'",
                'alamat_pendidikan_sebelumnya' => "'" .  isset($row['alamat_pendidikan_sebelumnya'])?$row['alamat_pendidikan_sebelumnya']:'' . "'",
                'npwp' => "'" .  isset($row['npwp'])?$row['npwp']:'' . "'",
                'no_kk' => "'" .  isset($row['no_kk'])?$row['no_kk']:'' . "'",
                'rt' => "'" .  isset($row['rt'])?$row['rt']:'' . "'",
                'rw' => "'" .  isset($row['rw'])?$row['rw']:'' . "'",
                'kode_pos' => "'" .  isset($row['kode_pos'])?$row['kode_pos']:'' . "'",
                'dusun_kampung' => "'" .  isset($row['dusunkampung'])?$row['dusunkampung']:'' . "'",
                'desa_kelurahan' => "'" .  isset($row['desakelurahan'])?$row['desakelurahan']:'' . "'",
                'kode_kecamatan' => "'" .  isset($row['kode_kecamatan'])?$row['kode_kecamatan']:'' . "'",
                'kecamatan' => "'" .  isset($row['kecamatan'])?$row['kecamatan']:'' . "'",
                'kota_kabupaten' => "'" .  isset($row['kotakabupaten'])?$row['kotakabupaten']:'' . "'",
                'propinsi' => "'" .  isset($row['propinsi'])?$row['propinsi']:'' . "'",


                'status_perkawinan' => "'" .  isset($row['status_perkawinan'])?$row['status_perkawinan']:'' . "'",
                'jenis_tinggal_mahasiswa' => "'" .  isset($row['jenis_tinggal_mahasiswa'])?$row['jenis_tinggal_mahasiswa']:'' . "'",
                'alat_transportasi_mahasiswa' => "'" .  isset($row['alat_transportasi_mahasiswa'])?$row['alat_transportasi_mahasiswa']:'' . "'",
                'ukuran_jaket' => "'" .  isset($row['ukuran_jaket'])?$row['ukuran_jaket']:'' . "'",
                'tinggi_badan' => "'" .  isset($row['tinggi_badan'])?$row['tinggi_badan']:'' . "'",
                'berat_badan' => "'" .  isset($row['berat_badan'])?$row['berat_badan']:'' . "'",
                'nirm' => "'" .  isset($row['nirm'])?$row['nirm']:'' . "'",
                'nisn' => "'" .  isset($row['nisn'])?$row['nisn']:'' . "'",
                'nama_sesuai_ijazah' => "'" .  isset($row['nama_sesuai_ijazah'])?$row['nama_sesuai_ijazah']:'' . "'",
                'operator_hp' => "'" .  isset($row['operator_hp'])?$row['operator_hp']:'' . "'",
                // 'foto' => "'" .  isset($row['foto'])?$row['foto']:'' . "'",
                // 'ijazah' => "'" .  isset($row['ijazah'])?$row['ijazah']:'' . "'",
                // 'transkrip_nilai' => "'" .  isset($row['transkrip_nilai'])?$row['transkrip_nilai']:'' . "'",
                // 'ktp' => "'" .  isset($row['ktp'])?$row['ktp']:'' . "'",
                // 'lampiran_ke_1' => isset($row['lampiran_ke_1'])?$row['lampiran_ke_1']:'',
                // 'lampiran_ke_2' => isset($row['lampiran_ke_2'])?$row['lampiran_ke_2']:'',
                // 'lampiran_ke_3' => isset($row['lampiran_ke_3'])?$row['lampiran_ke_3']:'',
                // 'lampiran_ke_4' => isset($row['lampiran_ke_4'])?$row['lampiran_ke_4']:'',
                // 'lampiran_ke_5' => isset($row['lampiran_ke_5'])?$row['lampiran_ke_5']:'',
                'semester' => isset($row['semester'])?$row['semester']:'',
                'tahap' => isset($row['tahap'])?$row['tahap']:'',
                'ips' => isset($row['ips'])?$row['ips']:'',
                'ipk' => isset($row['ipk'])?$row['ipk']:'',
                'sks' => isset($row['sks'])?$row['sks']:'',
                'sksk' => isset($row['sksk'])?$row['sksk']:'',
                // 'jumlah_login' => isset($row['jumlah_login'])?$row['jumlah_login']:0,
                // 'sejarah_login' => isset($row['sejarah_login'])?$row['sejarah_login']:'',
                'masa_studi_tahun' => "'" .  isset($row['masa_studi_tahun'])?$row['masa_studi_tahun']:'' . "'",
                'masa_studi_bulan' => "'" .  isset($row['masa_studi_bulan'])?$row['masa_studi_bulan']:'' . "'",
                'masa_studi_hari' => "'" .  isset($row['masa_studi_hari'])?$row['masa_studi_hari']:'' . "'",
                'masa_studi_deskripsi' => "'" .  isset($row['masa_studi_deskripsi'])?$row['masa_studi_deskripsi']:'' . "'",
                'no_urut_data' => isset($row['no_urut_data'])?$row['no_urut_data']:'',
                'filename' =>$request->filename,
              ]);
              array_push($dataX,$dat[0]);
            }
            $dataX = collect($dataX)->map(function($x){ return (array) $x;})->toArray();
            // dd($dataX);
            try {
              //insert data dengan jumlah ' yang lewat batas maksimal
              foreach (array_chunk($dataX,500) as $chunk) {
                DB::table('mahasiswa_import')->insertOrIgnore($chunk);
              }
            } catch(\Illuminate\Database\QueryException $e) {
              return redirect()->route('home')->with("successMsg", 'Ada kesalahan: '.$e);
            }
            // $result =  DB::table('mahasiswa_import')->insert($dataX);

         } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
           $failures = $e->failures();
           $err = "Terjadi kesalahan: ";
           foreach ($failures as $failure) {
               $failure->row(); // row that went wrong
               $failure->attribute(); // either heading key (if using heading row concern) or column index
               foreach ($failure->errors() as $error) {
                 $err = $err . $error . ". "; // Actual error messages from Laravel validator
               }
               $failure->values(); // The values of the row that has failed.
            }
            return redirect()->route('home')->with("successMsg", $err);
         }
         return redirect()->route('home')->with("successMsg", 'Data dari Berkas telah tersimpan');
    }


    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  string  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MahasiswaImport  $mahasiswaImport
     * @return \Illuminate\Http\Response
     */
    public function edit(MahasiswaImport $mahasiswaImport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MahasiswaImport  $mahasiswaImport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MahasiswaImport $mahasiswaImport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MahasiswaImport  $mahasiswaImport
     * @return \Illuminate\Http\Response
     */
    // public function destroy(MahasiswaImport $mahasiswaImport)
    public function destroy(String $filenameX)
    {
        // dd($filenameX);
        try {
          DB::table('mahasiswa_import')->where('filename',$filenameX)->delete();
        } catch(\Illuminate\Database\QueryException $e) {
          return redirect()->route('home')->with("successMsg", 'Ada kesalahan: '.$e);
        }
        return redirect()->route('home')->with("successMsg", 'data mahasiswa terhapus');
    }
}
