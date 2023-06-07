<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController as S;

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
    return view('welcome');
});

Route::prefix('services')->name('services-')->group(function () {
    Route::get('/', [S::class, 'index'])->name('index');
    Route::get('/create', [S::class, 'create'])->name('create');
    Route::post('/create', [S::class, 'store'])->name('store');
    Route::get('/edit/{service}', [S::class, 'edit'])->name('edit');
    Route::put('/edit/{service}', [S::class, 'update'])->name('update');
    Route::delete('/delete/{service}', [S::class, 'destroy'])->name('delete');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
