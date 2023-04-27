<?php

use App\Http\Controllers\UserController;
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


// Route::get('/', 'UserController@index');
Route::get('/', [UserController::class, 'index'])->name('index');

// Route::post('users/', 'UserController@store')->name('users.store');
 Route::post('users/', [UserController::class, 'store'])->name('store');


// Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('destroy');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('pages', PageController::class); //crea las 7 rutas que se generan en el controller al ejecutar el comando make:controller -r

// Route::get('/prueba-middleware/', function(){
//     return 'probando middleware';
// })->middleware('auth');