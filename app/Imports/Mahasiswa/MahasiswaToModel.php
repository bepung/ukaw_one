<?php

namespace App\Imports\Mahasiswa;

use App\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Validation\Rule;

// HeadingRowFormatter::default('none');
class MahasiswaToModel implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'nim';
    }

    /**
     * @param array $row
     *
     * @return Mahasiswa|null
     */
    public function model(array $row)
    {
        return new Mahasiswa([
          'nim' => isset($row['nim'])?$row['nim']:"",
          'nama' => isset($row['nama'])?$row['nama']:"",
          'agama' => isset($row['agama'])?$row['agama']:"",
          'alamat' => isset($row['alamat'])?$row['alamat']:"",
          'rt' => isset($row['rt'])?$row['rt']:"",
          'rw' => isset($row['rw'])?$row['rw']:"",
          'kelurahan' => isset($row['desakelurahan'])?$row['desakelurahan']:"",
          'kecamatan' => isset($row['kecamatan'])?$row['kecamatan']:"",
          'kota' => isset($row['kotakabupaten'])?$row['kotakabupaten']:"",
          'propinsi' => isset($row['propinsi'])?$row['propinsi']:"",
          'nik' => isset($row['nomor_ktp'])?$row['nomor_ktp']:"",
          'pendapatan_ortu' => isset($row['rata_rata_penghasilan_ayah'])?$row['rata_rata_penghasilan_ayah']:"",
          'pendidikan_ortu' => isset($row['jenjang_pendidikan_ayah'])?$row['jenjang_pendidikan_ayah']:"",
          'pekerjaan_ortu' => isset($row['jenis_pekerjaan_ayah'])?$row['jenis_pekerjaan_ayah']:"",
          'hp' => isset($row['hp'])?$row['hp']:"",
          'jurusan' => isset($row['jurusan'])?$row['jurusan']:"",
        ]);
    }

    public function rules(): array {
      return [ 'nim' => Rule::unique('mahasiswa','nim'), ];
    }

    public function customValidationMessage() {
      return ['nim.unique' => 'data dengan nim tersebut telah tercatat',];
    }
}
