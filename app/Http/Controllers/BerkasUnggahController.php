<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BerkasUnggah;

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
             $name      =   time().'-'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
             $target_path    =   public_path('/uploads/');
                 if($file->move($target_path, $name)) {
                     // save file name in the database
                     $file   =   BerkasUnggah::create(['filename' => $name, 'username' => auth()->user()->name]);
                     return redirect()->route('home')->with("success", "berhasil unggah berkas ");
                 }
             }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
