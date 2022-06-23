<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
  protected $table = 'mahasiswa';
  protected $fillable = [
    'nim', 'nama', 'agama', 'alamat',
    'rt', 'rw', 'kelurahan', 'kecamatan',
    'kota', 'propinsi',
    'nik', 'pendapatan_ortu', 'pekerjaan_ortu',
    'pendidikan_ortu', 'hp', 'jurusan',
  ];
}
