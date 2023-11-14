<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TbPengumpulanController;
use App\Http\Controllers\Tugas_SiswaController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/register', RegisterController::class, 'register');
// Route::post('/login', LoginController::class, 'login');
// Route::get('/user-profile', UserController::class, 'UserController@login');

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', [LoginController::class,'login']);
// Route::get('/user-profile', 'UserController@login');;

//untuk table hari
Route::get('/hari', [HariController::class,'index']);
Route::post('/hari/add', [HariController::class,'tambahhari']);
Route::post('/hari/update/{id}', [HariController::class,'update']);
Route::post('/hari/delete/{id}', [HariController::class,'delete']);

//untuk table mapel
Route::get('/mapel', [MapelController::class,'index']);
Route::post('/mapel/add', [MapelController::class,'tambahmapel']);
Route::post('/mapel/update/{id}', [MapelController::class,'update']);
Route::post('/mapel/delete/{id}', [MapelController::class,'delete']);

//untuk table kelas
Route::get('/kelas', [KelasController::class,'index']);
Route::post('/kelas/add', [KelasController::class,'tambahkelas']);
Route::post('/kelas/update/{id}', [KelasController::class,'update']);
Route::post('/kelas/delete/{id}', [KelasController::class,'delete']);

//untuk table tugas siswa
Route::get('tugas-siswa', [Tugas_SiswaController::class, 'index']);
Route::get('tugas-siswa/show/{id}', [
    Tugas_SiswaController::class,
    'show',
]);
Route::post('tugas-siswa/add', [Tugas_SiswaController::class, 'store']);
Route::post('tugas-siswa/edit/{id}', [
    TbTugasSiswaController::class,
    'update',
]);
Route::post('tugas-siswa/delete/{id}', [
    TbTugasSiswaController::class,
    'destroy',
]);