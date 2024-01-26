<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/admin/home', function () {
    return view('/admin/home');
});
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/admin/barang/data-barang', function () {
    return view('/admin/barang/data-barang');
});
Route::get('/admin/masuk/data-masuk', function () {
    return view('/admin/masuk/data-masuk');
});
Route::get('/admin/keluar/data-keluar', function () {
    return view('/admin/keluar/data-keluar');
});

Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'authentication'])->middleware('guest');
Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth');

Route::get('/admin/home',[DashboardController::class, 'index'])->middleware('auth');

Route::get('/admin/barang/data-barang',[BarangController::class, 'index'])->middleware('auth')->name('data-barang');
Route::get('/admin/barang/data-barang/create',[BarangController::class, 'create'])->middleware('auth');
Route::post('/admin/barang/data-barang',[BarangController::class, 'store'])->middleware('auth');
Route::get('/admin/barang/barang-edit/{id}',[BarangController::class, 'edit'])->middleware('auth');
Route::put('/admin/barang/data-barang/{id}',[BarangController::class, 'update'])->middleware('auth');
Route::get('/admin/barang/data-delete/{id}',[BarangController::class, 'delete'])->middleware('auth');
Route::delete('/admin/barang/data-delete/{id}',[BarangController::class, 'destroy'])->middleware('auth');
Route::get('/admin/barang/barang-export',[BarangController::class, 'export']);

Route::get('/admin/masuk/data-masuk',[MasukController::class, 'index'])->middleware('auth');
Route::get('/admin/masuk/masuk-add',[MasukController::class, 'create'])->middleware('auth');
Route::post('/admin/masuk/data-masuk',[MasukController::class, 'store'])->middleware('auth');
Route::get('/admin/masuk/masuk-edit/{id}',[MasukController::class, 'edit'])->middleware('auth');
Route::put('/admin/masuk/data-masuk/{id}',[MasukController::class, 'update'])->middleware('auth');
Route::get('/admin/masuk/masuk-delete/{id}',[MasukController::class, 'delete'])->middleware('auth');
Route::delete('/admin/masuk/masuk-delete/{id}',[MasukController::class, 'destroy'])->middleware('auth');
Route::get('/admin/masuk/masuk-export',[MasukController::class, 'export'])->middleware('auth');
Route::get('/admin/masuk/export-pdf/{id}',[MasukController::class, 'pdf'])->middleware('auth');


Route::get('/admin/keluar/data-keluar',[KeluarController::class, 'index'])->middleware('auth')->name('data-keluar');
Route::get('/admin/keluar/keluar-add',[KeluarController::class, 'create'])->middleware('auth');
Route::post('/admin/keluar/data-keluar',[KeluarController::class, 'store'])->middleware('auth');
Route::get('/admin/keluar/keluar-edit/{id}',[KeluarController::class, 'edit'])->middleware('auth');
Route::put('/admin/keluar/data-keluar/{id}',[KeluarController::class, 'update'])->middleware('auth');
Route::get('/admin/keluar/keluar-delete/{id}',[KeluarController::class, 'delete'])->middleware('auth');
Route::delete('/admin/keluar/keluar-delete/{id}',[KeluarController::class, 'destroy'])->middleware('auth');
Route::get('/admin/keluar/keluar-export',[KeluarController::class, 'export'])->middleware('auth');
Route::get('/admin/keluar/export-pdf/{id}',[KeluarController::class, 'pdf'])->middleware('auth');

Route::get('/admin/jenis/data-jenis',[JenisController::class, 'index'])->middleware('auth');
Route::get('/admin/jenis/jenis-add',[JenisController::class, 'create'])->middleware('auth');
Route::post('/admin/jenis/data-jenis',[JenisController::class, 'store'])->middleware('auth');
Route::get('/admin/jenis/jenis-edit/{id}',[JenisController::class, 'edit'])->middleware('auth');
Route::put('/admin/jenis/data-jenis/{id}',[JenisController::class, 'update'])->middleware('auth');
Route::get('/admin/jenis/jenis-delete/{id}',[JenisController::class, 'delete'])->middleware('auth');
Route::delete('/admin/jenis/jenis-delete/{id}',[JenisController::class, 'destroy'])->middleware('auth');
Route::get('/admin/jenis/jenis-export',[JenisController::class, 'export'])->middleware('auth');








