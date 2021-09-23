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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Auth::routes();

Route::get('/', function(){
    return redirect()->route('login');
});
Route::get('/home', 'App\Http\Controllers\Painel\HomeController@index')->name('home');
Route::resource('/produtos', 'App\Http\Controllers\Painel\ProdutoController');

