<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PruebaController;
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

Route::group(['prefix'=> 'Vacalog'], function () {
    Route::view('/login', "login")->name("login");
    Route::post('/iniciarsesion', [LoginController::class,'login'])->name('iniciar-sesion');
    Route::view('/registro','registro')->name('registro');
    Route::post('registrar',[LoginController::class,'registrar'])->name('registrar');
    Route::view('/registro-trabajador','empleado.index')->name('registro-trabajador');
    Route::post('/registrar-trabajador', [LoginController::class, 'registrarTrabajador'])->name('trabajador.registrar');
    Route::get("/logout",[LoginController::class,'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
    Route::resource('/portal', \App\Http\Controllers\PortalController::class);
    Route::resource('/index', \App\Http\Controllers\JefeController::class);

    Route::post('/vacaciones/solicitar', [\App\Http\Controllers\VacacionesController::class, 'store'])->name('vacaciones.solicitar');


    Route::get('listar', [\App\Http\Controllers\VacacionesController::class, 'listtable'])->name('vacaciones.listar');
    Route::get('listarvaca',[\App\Http\Controllers\JefeController::class,'listtable'])->name('jefe.listarvaca');
    Route::post('/vacaciones/aceptar/{id}', [\App\Http\Controllers\JefeController::class, 'aceptar'])->name('vacaciones.aceptar');
    Route::post('/vacaciones/denegar/{id}', [\App\Http\Controllers\JefeController::class, 'denegar'])->name('vacaciones.denegar');

});


});