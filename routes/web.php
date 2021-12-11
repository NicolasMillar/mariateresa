<?php

use App\Http\Controllers\AsistenteController;
use App\Http\Controllers\AuxiliarController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EventoController;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\SliderController;
use App\Models\Evento;
use App\Models\HomeSlider;
use Carbon\Carbon;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\Usuario_alumnoController;
use App\Http\Controllers\Usuario_profesorController;
use App\Models\Asistente;
use App\Models\Noticia;
use App\Models\Usuario_profesor;

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
    $owl = HomeSlider::where('Estado', 1)->get();
    $eventos = Evento::where('FechaTermino_Evento', '>', \Carbon\Carbon::now())->orderBy('FechaInicio_Evento', 'asc')->take(3)->get();
    $noticias = Noticia::where('Estado', 'active')->get();
    return view('welcome', compact('owl', 'eventos', 'noticias'));
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

Route::resource('auxiliares', AuxiliarController::class)->names('admin.auxiliar');
Route::resource('pusuarios', Usuario_profesorController::class)->names('admin.usuario_profesor');
Route::resource('alumnos', Usuario_alumnoController::class)->names('admin.usuario_alumno');
Route::resource('cursos', CursoController::class)->names('admin.curso');
Route::resource('sliders', HomeSliderController::class)->names('admin.homeslider');
Route::resource('eventos', EventoController::class)->names('admin.evento');
Route::resource('noticias', NoticiaController::class)->names('admin.noticia');
Route::resource('asistentes', AsistenteController::class)->names('admin.asistente');
Route::resource('asignaturas', AsignaturaController::class)->names('admin.asignatura');

Route::resource('file', 'App\Http\Controllers\FileController');

Route::get('/test','App\Http\Controllers\Imagecontroller@index');
Route::resource('test','App\Http\Controllers\Imagecontroller');
