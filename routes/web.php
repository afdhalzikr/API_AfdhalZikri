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

Route::get('admin', function () {
    return view('admin_template');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pegawai', 'PegawaiController@index')->name('pegawai');
Route::get('/tpp', 'TppController@index')->name('tpp');
Route::post('/tpp/hitung', 'TppController@hitung')->name('tpp_hitung');
Route::post('/tambah/pegawai', 'PegawaiController@tambah')->name('pegawai_tambah');
Route::post('/edit/pegawai', 'PegawaiController@edit')->name('pegawai_edit');
Route::post('/hapus/pegawai', 'PegawaiController@hapus')->name('pegawai_hapus');

//MOBILE ROUTE------------------------------------------------------------------------
Route::get('mobile/getPegawai','ApiController@getDataPegawai');
Route::post('mobile/HitungTPP','ApiController@hitungTPP');
?>