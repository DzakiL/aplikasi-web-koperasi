<?php

use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PelunasanController;
use App\Http\Controllers\API\PinjamanController;
use App\Http\Controllers\API\RekomendasiController;
use App\Http\Controllers\API\SimpananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     // return $request->user();
//     Route::resource('simpanans',  SimpananController::class);
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('simpanans',  SimpananController::class);
    Route::post('hitung', [SimpananController::class, 'hitung']);
    Route::get('halo', [SimpananController::class, 'index']);
    Route::resource('pinjamans', PinjamanController::class);
    Route::resource('anggotas', AnggotaController::class);
    Route::resource('rekomendasis', RekomendasiController::class);
    Route::resource('pelunasans', PelunasanController::class);
    // Route::get('hitung', function () {
    //     return [SimpananController::class, 'hitung'];
    // });
});



// Auth::routes();
// //nama route tidak boleh ada yang sama walaupun berbeda akses usernya
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homee');

// //tes login
// //Admin
// Route::group(['middleware' => ['role:admin|pengawas|kepala desa']], function () {
//     Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// });

// //Anggota
// Route::group(['middleware' => ['role:anggota koperasi']], function () {
//     Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
