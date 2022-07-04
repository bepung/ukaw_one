<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Exports\MahasiswaExportFromCollection;
use DB;

class MahasiswaExportController extends Controller
{
    /**
     * @param  Request  $req
     * @return \Illuminate\Http\Response
     */
    public function export(Request $req) {
        // dd($req);
        return Excel::download(new MahasiswaExportFromCollection, 'mahasiswa_export.xlsx');
        return redirect()->route('readDataMahasiswa', [$req]);
    }
}
