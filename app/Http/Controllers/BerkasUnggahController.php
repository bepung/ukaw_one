<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BerkasUnggah;
use File;

class BerkasUnggahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
         {
             return view('berkasUnggah');
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berkasUnggah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)  {
             // file validation
             $validator      =   Validator::make($request->all(),
                 ['filename'      =>   'required|mimes:xls,xlsx|max:2048']);
             // if validation fails
             if($validator->fails()) {
                 return back()->withErrors($validator->errors());
             }
             // if validation success
             if($file   =   $request->file('filename')) {
             $name      =   time().'-'.$file->getClientOriginalName();
             $target_path    =   public_path('/uploads/');
                 if($file->move($target_path, $name)) {
                     // save file name in the database
                     $file   =   BerkasUnggah::create(['filename' => $name, 'username' => auth()->user()->name]);
                     return redirect()->route('home')->with("successMsg", "berhasil unggah berkas ");
                 }
             }
     }


     /**
      * Remove the specified resource from storage.
      *
      * @param  string  $filename
      * @return \Illuminate\Http\Response
      */
     public function destroy($filename)
     {
       $name = public_path('\\uploads\\') . $filename;
       $str = "";
       if (File::exists($name)){
         $hasil1=File::delete($name);
         if ($hasil1) $str = $str . "berhasil hapus berkas.";
       } else {
         $str = $str . "berkas tidak ada.";
       }
       $hasil2=BerkasUnggah::where('filename',$filename)->delete();
       if ($hasil2>0) $str = $str . " berhasil hapus data.";
       return redirect()->route('home')->with("successMsg", $str);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
