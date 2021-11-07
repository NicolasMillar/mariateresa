<?php

use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
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
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/historia', function () {
    return view('historia');
})->name('historia');

Route::get('/admin/slider',  AdminHomeSliderComponent::class)->name('admin.homeslider');
Route::get('/admin/slider/add',  AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
Route::get('/admin/slider/edit/{slide_id}',  AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

