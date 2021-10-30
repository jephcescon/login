<?php
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', 'DashBoardController@index')->name('listar')->middleware('auth');

Route::get('/visualizar/{id}', 'DashBoardController@show')->name('visualizar')->middleware('auth');

Route::get('/editar/{id}', 'DashBoardController@edit')->name('editar')->middleware('auth');
Route::post('/editar/{id}', 'DashBoardController@update')->name('atualizar')->middleware('auth');

Route::get('/criar', 'DashBoardController@create')->name('criar')->middleware('auth');
Route::post('/criar', 'DashBoardController@store')->name('salvar')->middleware('auth');

Route::delete('/remover/{id}', 'DashBoardController@destroy')->name('exluir')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');
Route::get('/login', 'EntrarController@index')->name('login');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/sair', 'EntrarController@sair');

Route::get('/registrar', 'EntrarController@create');
Route::post('/registrar', 'EntrarController@store');
