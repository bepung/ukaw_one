<?php

namespace App\Imports\Mahasiswa;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MahasiswaToModelImport implements WithMultipleSheets
{
  public function sheets(): array
      {
          return [
              new MahasiswaToModel()
          ];
      }
}
