<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/testing', function () {
    return view('testing');
});
Route::get('showAlert', function () {
    return view('showAlert');
});
Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('berkasUnggah','BerkasUnggahController')->only(['store','destroy', 'index']);
Route::get('berkasUnggah','BerkasUnggahController@index')->name('berkasUnggah.index');
Route::post('berkasUnggah.store','BerkasUnggahController@store')->name('berkasUnggah.store');
Route::delete('berkasUnggah.destroy/{filename}','BerkasUnggahController@destroy')->name('berkasUnggah.destroy');

Route::get('allDataMahasiswa','MahasiswaController@allData')->name('allDataMahasiswa');
Route::post('readDataMahasiswa','MahasiswaController@readData')->name('readDataMahasiswa');
Route::get('readDataMahasiswa', function(){
  return redirect(route('allDataMahasiswa'));
});
Route::post('writeDataMahasiswa','MahasiswaController@writeData')->name('writeDataMahasiswa');
Route::post('countDataMahasiswa_1','MahasiswaController@rowCountByFilename')->name('countDataMahasiswa_1');

Route::get('exportDataMahasiswa','MahasiswaExportController@export')->name('exportDataMahasiswa');

//Route::resource('berkasImport','MahasiswaImportController')->only(['store','destroy']);
Route::post('berkasImport.store','MahasiswaImportController@store')->name('berkasImport.store');
Route::delete('berkasImport.destroy/{filenameX}','MahasiswaImportController@destroy')->name('berkasImport.destroy');
Auth::routes();
