<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\PelabuhanController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\KontainerController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DatapengirimanController;

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
Route::get('/', [LoginController::class,'index']);
Route::resource('/login',LoginController::class);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::middleware(['superadmin'])->group(function () {
        Route::resource('/negara',NegaraController::class);
        Route::resource('/user',UserController::class);
        Route::resource('/dashboard',DashboardController::class);
        Route::post('/dashboard/tracking',[DashboardController::class,'tracking']);
        Route::resource('/pelabuhan',PelabuhanController::class);
        Route::resource('/kapal',KapalController::class);
        Route::resource('/kontainer',KontainerController::class);
        Route::resource('/pengiriman',PengirimanController::class);
        Route::post('/negara/update', [NegaraController::class, 'update']);
        Route::post('/user/update', [UserController::class, 'update']);
        Route::post('/pelabuhan/update', [PelabuhanController::class, 'update']);
        Route::post('/kapal/update', [KapalController::class, 'update']);
        Route::post('/kontainer/update', [KontainerController::class, 'update']);
        Route::post('/pengiriman/update', [PengirimanController::class, 'update']);
        Route::get('/getPelabuhan/{id}', [PengirimanController::class, 'ajax']);
        Route::get('/getKontainer/{id}', [PengirimanController::class, 'kontainer']);
    });
    
    Route::middleware(['operator'])->group(function () {
        Route::get('/terima', [DatapengirimanController::class, 'terima']);
        Route::get('/datapengiriman', [DatapengirimanController::class,'index']);
    });
    
    
    
});
