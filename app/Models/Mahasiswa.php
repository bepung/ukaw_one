<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class Mahasiswa implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
           'nama'     => $row[0],
           'nim'    => $row[1],
           'agama'    => $row[2],
           'alamat'    => $row[3],
           'rt'    => $row[4],
           'rw'    => $row[5],
           'kelurahan'    => $row[6],
           'kecamatan'    => $row[7],
           'kota'    => $row[8],
           'propinsi'    => $row[9],
           'nik'    => $row[10],
           'pendapatan_ortu'    => $row[11],
           'pendidikan_ortu'    => $row[12],
           'pekerjaan_ortu'    => $row[13],
           'hp'    => $row[14],
           // 'password' => Hash::make($row[2]),
        ]);
    }
}
