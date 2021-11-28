<?php

use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Models\User;


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

Route::get('/cancion', function () {
    return view('cancion');
})->name('cancion');

Route::get('/comentarios', function () {
    return view('comentarios');
})->name('comentarios');

Route::get('/admin/slider',  AdminHomeSliderComponent::class)->name('admin.homeslider');
Route::get('/admin/slider/add',  AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
Route::get('/admin/slider/edit/{slide_id}',  AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

Route::resource('file', 'App\Http\Controllers\FileController');

Route::resource('alumnohome','App\Http\Controllers\newLogcontroller')->names(['index'=> 'alumno.home']);

Route::get('login', 'App\Http\Controllers\newLogcontroller@entrar')-> name('login');

Route::post('login', 'App\Http\Controllers\newLogcontroller@login');