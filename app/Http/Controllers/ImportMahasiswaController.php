<?php
namespace App\Http\Controllers;

use App\Imports\Mahasiswa as MahasiswaImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel as Excel;


class ImportMahasiswaController extends Controller
{
    function index() {
      $data = DB::table('mahasiswa_import')->orderBy('nim', 'ASC')->get();
      return view('importMahasiswa', compact('data'));
    }

    function import(string $filename) {


      // $this->validate($request, [
          // 'select_file'  => 'required|mimes:xls,xlsx'
         // ]);

         // $path = $request->file('select_file')->getRealPath();
         $name = public_path('\\uploads\\') . $filename;
         return redirect()->route('home')->with("successMsg", $data);
         $data = Excel::import(new MahasiswaImport,$name);

         if($data->count() > 0)
         {
          foreach($data->toArray() as $key => $value)
          {
           foreach($value as $row)
           {
            $insert_data[] = array(
               'id' => $row['ID'],
               'nim' => $row['NIM'],
               'alamat' => $row['NAMA'],
               'nama' => $row['ALAMAT'],
               'telp' => $row['TELP'],
               'email' => $row['EMAIL'],
               'tahun_angkatan' => $row['TAHUNANGKATAN'],
               'tanggal_masuk' => $row['TANGGALMASUK'],
               'tempat_lahir' => $row['TEMPATLAHIR'],
               'tanggal_lahir' => $row['TANGGALLAHIR'],
               'tanggal_lahir_manual' => $row['TANGGALLAHIRMANUAL'],
               'kelamin' => $row['KELAMIN'],
               'jurusan' => $row['JURUSAN'],
               'konsentrasi' => $row['KONSENTRASI'],
               'jenjang' => $row['JENJANG'],
               'semester_mulai' => $row['SEMESTERMULAI'],
               'program' => $row['PROGRAM'],
               'agama' => $row['AGAMA'],
               'warganegara' => $row['WARGANEGARA'],
               'negara' => $row['NEGARA'],
               'status_awal_mahasiswa' => $row['STATUSAWALMAHASISWA'],
               'merupakan_pindahan' => $row['MERUPAKANPINDAHAN'],
               'pindahan_dari_kampus' => $row['PINDAHANDARIKAMPUS'],
               'nama_prodi_pindah' => $row['NAMAPRODIPINDAH'],
               'nim_pindahan' => $row['NIMPINDAHAN'],
               'pindah_dari_kampus_lama_di_semester' => $row['PINDAHDARIKAMPUSLAMADISEMESTER'],
               'pindah_ke_kampus_ini_masuk_semester' => $row['PINDAHKEKAMPUSINIMASUKSEMESTER'],
               'tanggal_pindah' => $row['TANGGALPINDAH'],
               'sks_yang_diakui' => $row['SKSYANGDIAKUI'],
               'keterangan_pindah' => $row['KETERANGANPINDAH'],
               'merupakan_alih_prodi' => $row['MERUPAKANALIHPRODI'],
               'nim_lama_sebelum_pindah' => $row['NIMLAMASEBELUMPINDAH'],
               'sks_yang_diakui_pindah_prodi' => $row['SKSYANGDIAKUIPINDAHPRODI'],
               'pindah_ke_prodi_ini_masuk_semester' => $row['PINDAHKEPRODIINIMASUKSEMESTER'],
               'tanggal_pindah_prodi' => $row['TANGGALPINDAHPRODI'],
               'keterangan_pindah_prodi' => $row['KETERANGANPINDAHPRODI'],
               'status_keluar' => $row['STATUSKELUAR'],
               'no_ijazah_1' => $row['NOIJAZAH1'],
               'no_ijazah_2' => $row['NOIJAZAH2'],
               'no_akta_1' => $row['NOAKTA1'],
               'no_akta_2' => $row['NOAKTA2'],
               'tahun_wisuda' => $row['TAHUNWISUDA'],
               'tahun_lulus' => $row['TAHUNLULUS'],
               'semester_lulus' => $row['SEMESTERLULUS'],
               'tanggal_lulus' => $row['TANGGALLULUS'],
               'tanggal_yudisium' => $row['TANGGALYUDISIUM'],
               'tanggal_sk_rektor' => $row['TANGGALSKREKTOR'],
               'judul_skripsi' => $row['JUDULSKRIPSI'],
               'predikat_kelulusan' => $row['PREDIKATKELULUSAN'],
               'beasiswa_mahasiswa_miskin' => $row['BEASISWAMAHASISWAMISKIN'],
               'beasiswa_bidik_misi' => $row['BEASISWABIDIKMISI'],
               'beasiswa_lain' => $row['BEASISWALAIN'],
               'facebookid' => $row['FACEBOOKID'],
               'google_id' => $row['GOOGLEID'],
               'twitter_id' => $row['TWITTERID'],
               'linkedin_id' => $row['LINKEDINID'],
               'jenis_seleksi' => $row['JENISSELEKSI'],
               'jenis_pembiayaan_mahasiswa' => $row['JENISPEMBIAYAANMAHASISWA'],
               'username_ojs' => $row['USERNAMEOJS'],
               'status_setelah_lulus' => $row['STATUSSETELAHLULUS'],
               'status_domisili_setelah_lulus' => $row['STATUSDOMISILISETELAHLULUS'],
               'feeder' => $row['FEEDER'],
               'idregpd' => $row['IDREGPD'],
               'lock_id' => $row['LOCKID'],
               'token' => $row['TOKEN'],
               'masa_studi' => $row['MASASTUDI'],
               'link_validasi_eksternal' => $row['LINKVALIDASIEKSTERNAL'],
               'nomor_skpi' => $row['NOMORSKPI'],
               'id_finger' => $row['IDFINGER'],
               'dosen_pa' => $row['DOSEN PA'],
               'kelas' => $row['KELAS'],
               'nomor_ktp' => $row['NOMOR KTP'],
               'nama_ayah' => $row['NAMA AYAH'],
               'tanggal_lahir_ayah' => $row['TANGGAL LAHIR AYAH'],
               'jenis_pekerjaan_ayah' => $row['JENIS PEKERJAAN AYAH'],
               'rata_rata_penghasilan_ayah' => $row['RATA-RATA PENGHASILAN AYAH'],
               'jenjang_pendidikan_ayah' => $row['JENJANG PENDIDIKAN AYAH'],
               'nama_ibu' => $row['NAMA IBU'],
               'tanggal_lahir_ibu' => $row['TANGGAL LAHIR IBU'],
               'jenis_pekerjaan_ibu' => $row['JENIS PEKERJAAN IBU'],
               'rata_rata_penghasilan_ibu' => $row['RATA-RATA PENGHASILAN IBU'],
               'jenjang_pendidikan_ibu' => $row['JENJANG PENDIDIKAN IBU'],
               'telp_rumah' => $row['TELP. RUMAH'],
               'hp' => $row['HP'],
               'status' => $row['STATUS'],
               'nomor_ktp_ayah' => $row['NOMOR KTP AYAH'],
               'nomor_ktp_ibu' => $row['NOMOR KTP IBU'],
               'npsn' => $row['NPSN (NOMOR POKOK SEKOLAH NASIONAL)'],
               'asal_pendidikan' => $row['ASAL PENDIDIKAN'],
               'alamat_pendidikan_sebelumnya' => $row['ALAMAT PENDIDIKAN SEBELUMNYA'],
               'npwp' => $row['NPWP'],
               'no_kk' => $row['NO. KK'],
               'rt' => $row['RT'],
               'rw' => $row['RW'],
               'kode_pos' => $row['KODE POS'],
               'dusun_kampung' => $row['DUSUN/KAMPUNG'],
               'desa_kelurahan' => $row['DESA/KELURAHAN'],
               'kode_kecamatan' => $row['KODE KECAMATAN'],
               'kecamatan' => $row['KECAMATAN'],
               'kota_kabupaten' => $row['KOTA/KABUPATEN'],
               'propinsi' => $row['PROPINSI'],
               'status_perkawinan' => $row['STATUS PERKAWINAN'],
               'jenis_tinggal_mahasiswa' => $row['JENIS TINGGAL MAHASISWA'],
               'alat_transportasi_mahasiswa' => $row['ALAT TRANSPORTASI MAHASISWA'],
               'ukuran_jaket' => $row['UKURAN JAKET'],
               'tinggi_badan' => $row['TINGGI BADAN'],
               'berat_badan' => $row['BERAT BADAN'],
               'nirm' => $row['NIRM'],
               'nisn' => $row['NISN'],
               'nama_sesuai_ijazah' => $row['NAMA SESUAI IJAZAH'],
               'operator_hp' => $row['OPERATORHP'],
               'foto' => $row['FOTO'],
               'ijazah' => $row['IJAZAH'],
               'transkrip_nilai' => $row['TRANSKRIP NILAI'],
               'ktp' => $row['KTP'],
               'lampiran_ke_1' => $row['LAMPIRAN KE-1'],
               'lampiran_ke_2' => $row['LAMPIRAN KE-2'],
               'lampiran_ke_3' => $row['LAMPIRAN KE-3'],
               'lampiran_ke_4' => $row['LAMPIRAN KE-4'],
               'lampiran_ke_5' => $row['LAMPIRAN KE-5'],
               'semester' => $row['SEMESTER'],
               'tahap' => $row['TAHAP'],
               'ips' => $row['IPS'],
               'ipk' => $row['IPK'],
               'sks' => $row['SKS'],
               'sksk' => $row['SKSK'],
               'jumlah_login' => $row['JUMLAH LOGIN'],
               'sejarah_login' => $row['SEJARAH LOGIN'],
               'masa_studi_tahun' => $row['MASA STUDI TAHUN'],
               'masa_studi_bulan' => $row['MASA STUDI BULAN'],
               'masa_studi_hari' => $row['MASA STUDI HARI'],
               'masa_studi_deskripsi' => $row['MASA STUDI DESKRIPSI'],
               'no_urut_data' => $row['NO_URUT_DATA']
            );
           }
          }

          if(!empty($insert_data))
          {
           DB::table('mahasiswa_import')->insert($insert_data);
          }
         }
         return back()->with('successMsg', 'Excel Data Imported successfully.');
        }
}
