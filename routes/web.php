<?php

use Illuminate\Support\Facades\Route;
use App\Controller\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\SdmController;
use App\Http\Controllers\TransaksiController;


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
    return redirect('/login');
});
Route::get('/login', function () {
    return view('/login');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/Auth.edit', function () {
    return view('/Auth.edit');
});
// Route::get('/asset', function () {
//     return view('/layouts.asset');
// });
// Route::get('/komponen', function () {
//     return view('/layouts.komponen');
// });
// Route::get('/software', function () {
//     return view('/layouts.software');
// });
// Route::get('/user', function () {
//     return view('/layouts.user');
// });
Route::resource('asset', AssetController::class);
Route::resource('komponen', KomponenController::class);
Route::resource('software', SoftwareController::class);
Route::resource('sdm', SdmController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksiPDF/{id}', [TransaksiController::class, 'exportlaporanPDF']);
Route::get('/transaksi_get_pinjam/{id}', [TransaksiController::class, 'getBarangPinjamanBelumKembali']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
