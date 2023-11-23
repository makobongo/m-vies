<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MoviesController::class, 'movies'])->name('index');
Route::get('/movie/{id}', [MoviesController::class, 'movie']);

// Route::match(['get', 'post'], 'login', function(){
//     return redirect('/');
// })->name('login');

// Route::match(['get', 'post'], 'register', function(){
//     return redirect('/');
// })->name('register');

// Route::get('login', 'MoviesController@movies')->name('login');
// Route::get('register', 'MoviesController@movies')->name('register');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
