<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReservaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|*/


Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/Reservas', function () {
 // return view('Reservas.create');
//});

Route::resource('productos', ProductoController::class)-> middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [ProductoController::class, 'index'])->name('home');

});

//Route::group(['middleware'=>'auth'],function(){
 //   Route::get('/',[ReservaController::class,'index'])->name('home');


//});
