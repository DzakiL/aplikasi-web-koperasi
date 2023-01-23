<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
//nama route tidak boleh ada yang sama walaupun berbeda akses usernya
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homee');

//tes login
//Admin
Route::group(['middleware' => ['role:admin|pengawas|kepala desa']], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

//Anggota
Route::group(['middleware' => ['role:anggota koperasi']], function () {
    Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// //Pengawas
// Route::group(['middleware' => ['role:pengawas']], function () {
//     Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// //Kades
// Route::group(['middleware' => ['role:kepala desa']], function () {
//     Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// });

// //Bumdes
// Route::group(['middleware' => ['role:ketua bumdes']], function () {
//     Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
