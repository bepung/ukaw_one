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
});
Route::get('/testing', function () {
    return view('testing');
});
Route::get('showAlert', function () {
    return view('showAlert');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('berkasUnggah','BerkasUnggahController')->only(['store','destroy', 'index']);;

Route::post('readDataMahasiswa','MahasiswaController@readData')->name('readDataMahasiswa');
Route::get('allDataMahasiswa','MahasiswaController@allData')->name('allDataMahasiswa');
Route::post('writeDataMahasiswa','MahasiswaController@writeData')->name('writeDataMahasiswa');
Route::post('countDataMahasiswa_1','MahasiswaController@rowCountByFilename')->name('countDataMahasiswa_1');

Route::get('exportDataMahasiswa','MahasiswaExportController@export')->name('exportDataMahasiswa');

Route::resource('berkasImport','MahasiswaImportController')->only(['store','destroy']);
Auth::routes();
