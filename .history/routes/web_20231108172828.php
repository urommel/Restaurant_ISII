<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TipoController;

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

Route::redirect('/', 'login');

Route::middleware(['auth', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function () {
        return view('pages/utility/404');
    });

    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('users', UserController::class)->names('users');

    //Jefe de Personal
    Route::resource('personal', PersonalController::class)->names('personal');

    //Mesero
    Route::resource('mesas', MesaController::class)->names('mesas');
    Route::resource('clients', ClientController::class)->names('clientes');

    Route::resource('categoria', CategoriaController::class)->names('categoria');
    Route::resource('tipos', TipoController::class)->names('tipos');

    // Route::resource('platos', PlatoController::class)->names('platos');
    // Route::resource('bebidas', BebidaController::class)->names('bebidas');
    Route::resource('productos', ProductosController::class)->names('productos');


    // Route::resource('ordenes', OrdersController::class)->names('ordenes');
    // Route::get('/ordenes/create/{mesas_id}', [OrdersController::class, 'create'])->name('ordene.create');

    Route::resource('orden', OrdenController::class)->names('orden');
    Route::get('/orden/create/{mesas_id}', [OrdenController::class, 'create'])->name('orde.create');
    Route::post('/crear-orden', [OrdenController::class, 'crearOrden']);



    Route::resource('reservation', ReservationController::class)->names('reservation');
    Route::post('reservations/{reservation}/confirm', [ReservationController::class, 'confirm'])->name('reservation.confirm');
    Route::post('reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservation.cancel');

    Route::resource('proveedor', ProveedorController::class)->names('proveedor');

    Route::resource('orden_compra', OrdenCompraController::class)->names('orden_compra');


    //Recepcionista

    //Gerente

    //Jefe de almacen

});
