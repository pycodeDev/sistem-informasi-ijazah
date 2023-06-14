<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/tes', [App\Http\Controllers\Controller::class, 'tes']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ijazah/{status?}', [App\Http\Controllers\IjazahController::class, 'IjazahAdmin'])->name('ijazah_admin');
Route::get('/ijazah/mhs/{id}/{level}', [App\Http\Controllers\IjazahController::class, 'index'])->name('ijazah');
Route::get('/ijazah/mhs/{nim}', [App\Http\Controllers\IjazahController::class, 'store'])->name('req_ijazah');

Route::post('/ijazah/action', [App\Http\Controllers\IjazahController::class, 'update'])->name('update_ijazah');

Route::get('/detail/user/{id}', [App\Http\Controllers\DetailUserController::class, 'index'])->name('detail_user');
Route::post('/detail/user/action', [App\Http\Controllers\DetailUserController::class, 'action'])->name('action_detail_user');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user_admin');
Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user_store');