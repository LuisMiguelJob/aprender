<?php

use App\Http\Controllers\ProgramController;
use App\Models\Program;
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

Route::get('inicio', function(){
    return view('inicio');
});

// Test

Route::get('/', function () { // Esta es la primera pagina que carga al poner la direccion url 
    return view('inicio');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Ruta de programas */
Route::post('program/{program}/add-lender/', [ProgramController::class, 'addLender'])->name('program.add-lender'); // agregar esto antes cuando se ponen metodos extra que los que proove el tipo resource
// addLender es el nombre del metodo en el controlador, name es para ponerlo en href sin problema
Route::resource('program', ProgramController::class); //->middleware('auth'); // El middleware con auth, es para comprobar un usuario y permitir entrar // primer metodo para middleware
