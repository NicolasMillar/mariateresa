<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/historia', function () {
    return view('historia');
})->name('historia');

Route::resource('file', 'App\Http\Controllers\FileController');

Route::get('/test','App\Http\Controllers\Imagecontroller@index');
Route::resource('test','App\Http\Controllers\Imagecontroller');