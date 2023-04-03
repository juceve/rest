<?php

use App\Http\Controllers\CatitemController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PreciomenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TipopagoController;
use App\Http\Controllers\TutoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Livewire\Clientes\Tutores;
use App\Http\Livewire\Clientes\Vinculosestudiantes;
use App\Http\Livewire\Cursos\Cursos;
use App\Http\Livewire\Entregas\Meriendas;
use App\Http\Livewire\Menu\Elaborarmenu;
use App\Http\Livewire\Menu\Events;
use App\Http\Livewire\Menu\Finish;
use App\Http\Livewire\Menu\Formapago;
use App\Http\Livewire\Menu\Pedido;
use App\Http\Livewire\Menu\Resumen;
use App\Http\Livewire\Settings\Settings;
use App\Http\Livewire\Sucursales;
use App\Http\Livewire\Ventas\Aprobarpedido;
use App\Http\Livewire\Ventas\Membresias;
use App\Http\Livewire\Ventas\Verificacionpedidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes(["register" => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:home')->name('home');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('empresas', EmpresaController::class)->names('empresas');
// SUCURSALES
Route::get('sucursales/{id}', Sucursales::class)->middleware('can:sucursales')->name('sucursales');
Route::resource('tipopagos', TipopagoController::class)->names('tipopagos');
Route::resource('tutores', TutoreController::class)->names('tutores');
Route::resource('menus', MenuController::class)->names('menus');
Route::get('settings', Settings::class)->name('settings');
Route::get('cursos', Cursos::class)->name('cursos')->middleware('can:cursos.index');
Route::resource('empleados', EmpleadoController::class)->names('empleados');
Route::post('empleados/{id}/disable', [EmpleadoController::class, 'disable'])->name('empleados.disable');
Route::get('tutores', Tutores::class)->name('tutores')->middleware('can:tutores.index');
Route::get('vinculosestudiantes/{id}', Vinculosestudiantes::class)->name('vinculosestudiantes');
Route::resource('estudiantes', EstudianteController::class)->names('estudiantes');
Route::resource('catitems', CatitemController::class)->names('catitems');
Route::resource('items', ItemController::class)->names('items');
Route::get('elaborarmenu/{id}', Elaborarmenu::class)->name('elaborarmenu');
Route::get('programarmenu', Events::class)->name('programarmenu');
Route::get('events', [EventoController::class, 'events'])->name('events');
Route::resource('precios', PreciomenuController::class)->names('precios');
Route::get('menusemanal', Pedido::class)->name('menusemanal');
Route::get('resumenpedido', Resumen::class)->name('resumenpedido');
Route::get('formapago/{tipoBusqueda}', Formapago::class)->name('formapago');
Route::get('fintransc/{id}', Finish::class)->name('fintransc');
Route::resource('ventas', VentaController::class)->names('ventas');
Route::get('vpagos', Verificacionpedidos::class)->name('vpagos');
Route::get('appedido/{venta_id}', Aprobarpedido::class)->name('appedido');
Route::get('emeriendas', Meriendas::class)->name('emeriendas');
Route::get('membresias',Membresias::class)->name('membresias');