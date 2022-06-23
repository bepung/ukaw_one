<?php

namespace App\Imports\MahasiswaImport;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MahasiswaImportToModelImport implements WithMultipleSheets
{
  public function sheets(): array
      {
          return [
              new MahasiswaImportToModel()
          ];
      }
}
