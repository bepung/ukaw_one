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
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::resource('berkasUnggah','BerkasUnggahController');

// Route::get('berkasImportView','ImportMahasiswaController@index');
// Route::get('berkasImportStore/{filename}','ImportMahasiswaController@import')->name('berkasImportStore');

Route::resource('berkasImport','MahasiswaImportController')->only(['store','show']);
