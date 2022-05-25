<?php

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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuarios','UsuariosController@index')->name('usuarios');
Route::get('/usuarios/create','UsuariosController@create')->name('usuarios.create');
Route::post('/usuarios/store','UsuariosController@store')->name('usuarios.store');
Route::get('/usuarios/edit/{use_id}','UsuariosController@edit')->name('usuarios.edit');
Route::post('/usuarios/update/{use_id}','UsuariosController@update')->name('usuarios.update');
Route::post('/usuarios/destroy/{use_id}','UsuariosController@destroy')->name('usuarios.destroy');

Route::get('/productos','ProductosController@index')->name('productos');
Route::post('/productos/store','ProductosController@store')->name('productos.store');
Route::get('/productos/create','ProductosController@create')->name('productos.create');
Route::get('/productos/edit/{prod_id}','ProductosController@edit')->name('productos.edit');
Route::post('/productos/update/{prod_id}','ProductosController@update')->name('productos.update');
Route::post('/productos/destroy/{prod_id}','ProductosController@destroy')->name('productos.destroy');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inventario','InventarioController@index')->name('inventario');
Route::get('/inventario/create','InventarioController@create')->name('inventario.create');
Route::post('/inventario/store','InventarioController@store')->name('inventario.store');
Route::get('/inventario/edit/{inv_id}','inventarioController@edit')->name('inventario.edit');
Route::post('/inventario/update/{inv_id}','InventarioController@update')->name('inventario.update');
Route::post('/inventario/destroy/{inv_id}','InventarioController@destroy')->name('inventario.destroy');
Route::post('/inventario/search','InventarioController@search')->name('inventario.search');

Route::get('/bodegas','BodegasController@index')->name('bodegas');
Route::post('/bodegas/store','BodegasController@store')->name('bodegas.store');
Route::get('/bodegas/create','BodegasController@create')->name('bodegas.create');
Route::get('/bodegas/edit/{bod_id}','BodegasController@edit')->name('bodegas.edit');
Route::post('/bodegas/update/{bod_id}','BodegasController@update')->name('bodegas.update');
Route::post('/bodegas/destroy/{bod_id}','BodegasController@destroy')->name('bodegas.destroy');

route::get('/provedor','provedorController@index')->name('provedor');
route::get('/provedor/create','provedorController@create')->name('provedor.create');
route::post('/provedor/store','provedorController@store')->name('provedor.store');
route::get('/provedor/edit/{prov_id}','provedorController@edit')->name('provedor.edit');
route::post('/provedor/update/{prov_id}','provedorController@update')->name('provedor.update');
route::post('/provedor/destroy/{prov_id}','provedorController@destroy')->name('provedor.destroy');


Route::post('/facturas_detalle','FacturasController@detalle')->name('facturas.detalle');

Route::resource('facturas','facturasController');

Route::get('/factura_pdf/{fac_id}','FacturasController@facturas_pdf')->name('facturas.pdf');;

Route::get('/reporte','reporteController@index')->name('reporte');
Route::post('/reporte/reporte','reporteController@reporte')->name('reporte.reporte');



