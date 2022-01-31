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
use App\Models\User;

use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\SliderController;
use App\Models\Evento;
use App\Models\HomeSlider;
use Carbon\Carbon;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\Usuario_alumnoController;
use App\Http\Controllers\Usuario_profesorController;
use App\Models\Asistente;
use App\Models\Noticia;
use App\Models\Usuario_profesor;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CategoriaAsignaturaController;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\TallerController;
use App\Models\Estudios_asistente;
use App\Models\Psicologo;
use App\Models\Titulo_profesor;
use Illuminate\Support\Facades\DB;




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
    $noticias = Noticia::where('Estado', 1)->get();
    return view('welcome', compact('owl', 'eventos', 'noticias'));
})->name('home');

Route::get('/historia', function () {
    return view('historia');
})->name('historia');

Route::get('/profesoresjefe', function () {
    $date = \Carbon\Carbon::now();
    $year =date('Y', strtotime($date));
    $profesores = DB::table('usuario_profesores')->join('cursos', 'cursos.Rut_Profesor', '=', 'usuario_profesores.Rut')->where('Anio_Academico', '=', $year)->where('Grado', '>', 1)->orderBy('cursos.Grado', 'asc')->orderBy('Valor_Curso', 'asc')->get();
    $titulos=Titulo_profesor::all();
    return view('cursos', compact('profesores', 'titulos'));
})->name('profesoresjefe');

Route::get('/asistenteseducacion', function () {
    $asistentes=Asistente::all();
    $titulos=Estudios_asistente::all();
    return view('asistentes', compact('asistentes', 'titulos'));
})->name('asistentes');

Route::get('/Talleres_Extracurriculares', function () {
    $profesores = DB::table('usuario_profesores')->join('talleres', 'talleres.Rut_Profesor', '=', 'usuario_profesores.Rut')->orderBy('talleres.id', 'asc')->get();
    return view('talleres_ex', compact('profesores'));
})->name('talleres_ex');

Route::get('/cancion', function () {
    return view('cancion');
})->name('cancion');

Route::get('/comentarios', function () {
    return view('comentarios');
})->name('comentarios');

Route::get('/contacto-psicologo', function () {
    $psicologos=Psicologo::all();
    return view('psicologia', compact('psicologos'));
})->name('psicologia');

Route::resource('auxiliares', AuxiliarController::class)->names('admin.auxiliar');
Route::resource('pusuarios', Usuario_profesorController::class)->names('admin.usuario_profesor');
Route::resource('alumnos', Usuario_alumnoController::class)->names('admin.usuario_alumno');
Route::resource('psicologos', PsicologoController::class)->names('admin.psicologo');
Route::resource('cursos', CursoController::class)->names('admin.curso');
Route::resource('sliders', HomeSliderController::class)->names('admin.homeslider');
Route::resource('eventos', EventoController::class)->names('admin.evento');
Route::resource('noticias', NoticiaController::class)->names('admin.noticia');
Route::resource('asistentes', AsistenteController::class)->names('admin.asistente');
Route::resource('asignaturas', AsignaturaController::class)->names('admin.asignatura');
Route::resource('categorias', CategoriaAsignaturaController::class)->names('admin.categoria_asignatura');
Route::resource('talleres', TallerController::class)->names('admin.taller');

Route::resource('file', 'App\Http\Controllers\FileController');
Route::get('participantes/{curso}', 'App\Http\Controllers\ParticipanteController@create')->name('participante.create');
Route::post('participantes/{curso}', 'App\Http\Controllers\ParticipanteController@store')->name('participante.store');
/*Route::middleware(['auth:sanctum', 'verified'])->get('/alumnohome', function () {
    return view('alumnohome');
})->name('alumnohome');*/
Route::get('alumnohome/calificaciones/{asignatura}/{alumno}', 'App\Http\Controllers\CalificacionController@index')->name('calificacion.index');
Route::get('alumnohome/anotaciones/{alumno}', 'App\Http\Controllers\AnotacionController@index')->name('anotacion.index');
Route::get('login', 'App\Http\Controllers\newlogincontroller@login')->name('login');
Route::post('validar', 'App\Http\Controllers\newlogincontroller@validar')->name('validar');
Route::get('alumnohome', 'App\Http\Controllers\newlogincontroller@alumno')->name('alumnohome');
Route::get('alumnohome', 'App\Http\Controllers\newlogincontroller@profesor')->name('profesorhome');
Route::get('cerrarsession', 'App\Http\Controllers\newlogincontroller@cerrarsession')->name('cerrarsession');
