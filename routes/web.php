<?php

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
    return view('auth.login');
    //Route::resource('categorias', 'CategoriaController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Grupos de rotas - Controllers

Route::group(['middleware' => ['auth']], function () {
    Route::resource('categorias', 'CategoriaController');
    Route::resource('clientes', 'ClientesController');
    Route::resource('usuarios', 'UserController');
    Route::resource('documentos', 'DocumentosController');
});


