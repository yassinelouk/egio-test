<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\comp;

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

Route::get('/home', [App\Http\Controllers\comp::class, 'show'])->name('home');
Route::put('/home/{id}', [App\Http\Controllers\comp::class, 'update'])->name('update');
//Auth::routes();
//
//
//Route::get('/home', [App\Http\Controllers\comp::class, 'show'])->name('home');
//Auth::routes();
//
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();

//Route::get('/form', 'comp@index')->name('userview');
//Route::get('/form', 'comp@show')->name('userview');


Route::view('form','userview');
Route::POST('submit','comp@store');
Route::resource('submit',comp::class);

//Route::resource('update',comp::class);

Route::resource('form',comp::class);