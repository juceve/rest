<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SucursaleController;
use App\Http\Controllers\TipopagoController;
use App\Http\Controllers\TutoreController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Cursos\Cursos;
use App\Http\Livewire\Settings\Settings;
use App\Http\Livewire\Sucursales;
use Illuminate\Support\Facades\Auth;
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
    return view('web');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:home')->name('home');
Route::resource('users',UserController::class)->only(['index','edit','update'])->names('users');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('empresas',EmpresaController::class)->names('empresas');

// SUCURSALES
Route::get('sucursales/{id}',Sucursales::class)->middleware('can:sucursales')->name('sucursales');

Route::resource('tipopagos', TipopagoController::class)->names('tipopagos');
Route::resource('tutores',TutoreController::class)->names('tutores');
Route::resource('menus',MenuController::class)->names('menus');
Route::get('settings',Settings::class)->name('settings');
Route::get('cursos', Cursos::class)->name('cursos')->middleware('can:cursos.index');
Route::resource('empleados', EmpleadoController::class)->names('empleados');
Route::post('empleados/{id}/disable',[EmpleadoController::class, 'disable'])->name('empleados.disable');
