<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
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
    return view('index.welcome');
})->middleware('guest');

Route::resource('/siswa', SiswaController::class)->middleware('isLogin');

Route::middleware('guest')->group(function() {
    Route::get('/login', [SessionController::class, 'index'])->name('indexLogin');
    Route::post('/login', [SessionController::class, 'login'])->name('login');
    Route::get('/register', [SessionController::class, 'indexRegis'])->name('indexRegis');
    Route::post('/register/create', [SessionController::class, 'storeRegis'])->name('storeRegis');
});
Route::get('/login/logout', [SessionController::class, 'logout'])->name('logout');