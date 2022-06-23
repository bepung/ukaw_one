<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswaImport\MahasiswaImportToModelImport;
use App\Imports\Mahasiswa\MahasiswaToModelImport;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel as Excel;

class MahasiswaImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $filename)
    {
      return redirect()->route('home')->with("successMsg", 'index');
      // return this()->store($filename);
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
         $name = public_path('\\uploads\\') . $request->filename;
         try {
           $data = Excel::import(new MahasiswaImportToModelImport,$name);
           // $data = Excel::import(new MahasiswaToModelImport,$name);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = DB::table('mahasiswa_import')->orderBy('nim', 'ASC')->get();
      return view('mahasiswaImport', compact('data'));
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
    public function destroy(MahasiswaImport $mahasiswaImport)
    {
        //
    }
}
