<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\detail_peminjamanController;
use App\Http\Controllers\UserController;


 



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);

Route::group(['middleware' =>['jwt.verify']],function () {

    
});
Route::post('/createsiswa',[SiswaController::class,'createsiswa']);
    Route::get('/getallsiswa',[SiswaController::class,'getallsiswa']);
    Route::get('/getsiswa/{id}',[SiswaController::class,'getsiswa']);
    Route::put('/updatesiswa/{id}',[SiswaController::class,'updatesiswa']);
    Route::delete('/deletesiswa/{id}',[SiswaController::class,'deletesiswa']);
    
    Route::post('/createkelas',[KelasController::class,'createkelas']);
    Route::get('/getkelas',[KelasController::class,'getkelas']);
    Route::put('/updatekelas/{id}',[KelasController::class,'updatekelas']);
    Route::delete('/deletekelas/{id}',[KelasController::class,'deletekelas']);
    
    Route::post('/createbuku',[BukuController::class,'createbuku']);
    Route::get('/getbuku',[BukuController::class,'getsemuabuku']);
    Route::get('/getbuku/{id}',[BukuController::class,'getbuku']);
    Route::put('/updatebuku/{id}',[BukuController::class,'updatebuku']);
    Route::delete('/deletebuku/{id}',[BukuController::class,'deletebuku']);
    
    Route::get('/getpeminjaman/{id}',[PeminjamanController::class,'getsemuaPeminjaman']);
    Route::get('/getpeminjaman',[PeminjamanController::class,'getPeminjaman']);
    Route::post('/createpeminjaman',[PeminjamanController::class,'createpeminjaman']);
    Route::put('/updatepeminjaman/{id}',[PeminjamanController::class,'updatepeminjaman']);
    Route::put('/updatepeminjaman/{id}',[PeminjamanController::class,'kembalipeminjaman']);
    Route::delete('/deletepeminjaman/{id}',[PeminjamanController::class,'deletepeminjaman']);
    
    Route::get('/getdetail_peminjaman',[detail_PeminjamanController::class,'getdetail_peminjaman']);
    Route::post('/createdetail_peminjaman',[detail_peminjamanController::class,'createdetail_peminjaman']);
    Route::put('/updatedetailpeminjaman/{id}',[PeminjamanController::class,'updatedetailpeminjaman']);
    Route::delete('/deletedetailpeminjaman/{id}',[PeminjamanController::class,'deletedetailpeminjaman']);
    