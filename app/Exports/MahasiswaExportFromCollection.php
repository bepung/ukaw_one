<?php
namespace App\Exports;

use App\Invoice;
use App\MahasiswaExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class MahasiswaExportFromCollection implements FromCollection, WithHeadings, WithStyles, WithEvents, WithTitle
{
    public function collection()
    {
        return MahasiswaExport::all();
    }
    public function title(): string {
      return "Data Mahasiswa UKAW";
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:DC1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('99CCFF');

            },
        ];
    }
    public function headings(): array
    {
        return [
          'ID',
          'NIM',
          'NAMA',
          'ALAMAT',
          'TELP',
          'EMAIL',
          'TAHUN ANGKATAN',

          'ANGKATAN',

          'TANGGAL MASUK',
          'TEMPAT LAHIR',
          'TANGGAL LAHIR',
          'TANGGAL LAHIR MANUAL',
          'KELAMIN',
          'JURUSAN',
          'KONSENTRASI',
          'JENJANG',
          'SEMESTER MULAI',
          'PROGRAM',
          'AGAMA',
          'WARGANEGARA',
          'NEGARA',
          'STATUS AWAL MAHASISWA',
          'MERUPAKAN PINDAHAN',
          'PINDAHAN DARI KAMPUS',
          'NAMA PRODI PINDAH',
          'NIM PINDAHAN',
          'PINDAH DARI KAMPUS LAMA DI SEMESTER',
          'PINDAH KE KAMPUS INI MASUK SEMESTER',
          'TANGGAL PINDAH',
          'SKS YANG DIAKUI',
          'KETERANGAN PINDAH',
          'MERUPAKAN ALIH PRODI',
          'NIM LAMA SEBELUM PINDAH',
          'SKS YANG DIAKUI PINDAH PRODI',
          'PINDAH KE PRODI INI MASUK SEMESTER',
          'TANGGAL PINDAH PRODI',
          'KETERANGAN PINDAH PRODI',
          'STATUS KELUAR',
          'NO IJAZAH 1',
          'NO IJAZAH 2',
          // 'NO AKTA 1',
          // 'NO AKTA 2',
          'TAHUN WISUDA',
          'TAHUN LULUS',
          'SEMESTER LULUS',
          'TANGGAL LULUS',
          'TANGGAL YUDISIUM',
          'TANGGAL SK REKTOR',
          'JUDUL SKRIPSI',
          'PREDIKAT KELULUSAN',
          'BEASISWA MAHASISWA MISKIN',
          'BEASISWA BIDIK MISI',
          'BEASISWA LAIN',
          // 'FACEBOOKID',
          // 'GOOGLE ID',
          // 'TWITTER ID',
          // 'LINKEDIN ID',
          'JENIS SELEKSI',
          'JENIS PEMBIAYAAN MAHASISWA',
          // 'USERNAME OJS',
          // 'STATUS SETELAH LULUS',

          // 'STATUS DOMISILI SETELAH LULUS',
          // 'FEEDER',
          // 'IDREGPD',
          // 'LOCK ID',
          // 'TOKEN',
          // 'MASA STUDI',
          // 'LINK VALIDASI EKSTERNAL',
          // 'NOMOR SKPI',
          // 'ID FINGER',
          'DOSEN PA',
          'KELAS',
          'NOMOR KTP',
          'NAMA AYAH',
          'TANGGAL LAHIR AYAH',
          'JENIS PEKERJAAN AYAH',
          'RATA RATA PENGHASILAN AYAH',
          'JENJANG PENDIDIKAN AYAH',
          'NAMA IBU',
          'TANGGAL LAHIR IBU',
          'JENIS PEKERJAAN IBU',
          'RATA RATA PENGHASILAN IBU',
          'JENJANG PENDIDIKAN IBU',
          'TELP RUMAH',
          'HP',
          'STATUS',
          'NOMOR KTP AYAH',
          'NOMOR KTP IBU',
          'NPSN',
          'ASAL PENDIDIKAN',
          'ALAMAT PENDIDIKAN SEBELUMNYA',
          'NPWP',
          'NO KK',
          'RT',
          'RW',
          'KODE POS',
          'DUSUN KAMPUNG',
          'DESA KELURAHAN',
          'KODE KECAMATAN',
          'KECAMATAN',
          'KOTA KABUPATEN',
          'PROPINSI',


          'STATUS PERKAWINAN',
          'JENIS TINGGAL MAHASISWA',
          'ALAT TRANSPORTASI MAHASISWA',
          'UKURAN JAKET',
          'TINGGI BADAN',
          'BERAT BADAN',
          'NIRM',
          'NISN',
          'NAMA SESUAI IJAZAH',
          'OPERATOR HP',
          // 'FOTO',
          // 'IJAZAH',
          // 'TRANSKRIP NILAI',
          // 'KTP',
          // 'LAMPIRAN KE 1',
          // 'LAMPIRAN KE 2',
          // 'LAMPIRAN KE 3',
          // 'LAMPIRAN KE 4',
          // 'LAMPIRAN KE 5',
          'SEMESTER',
          'TAHAP',
          'IPS',
          'IPK',
          'SKS',
          'SKSK',
          // 'JUMLAH LOGIN',
          // 'SEJARAH LOGIN',
          'MASA STUDI TAHUN',
          'MASA STUDI BULAN',
          'MASA STUDI HARI',
          'MASA STUDI DESKRIPSI',
          'NO. URUT',
          'FILENAME',
        ];
    }
}
