<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
//     // return "hello world";
// });

//in laravel 8
Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/services ', 'App\Http\Controllers\PagesController@services');


// Route::get('/ ', 'App\Http\Controllers\ProductController@index');
// Route::get('/create ', 'App\Http\Controllers\ProductController@create');
// Route::get('/show ', 'App\Http\Controllers\ProductController@show');
// Route::get('/edit ', 'App\Http\Controllers\ProductController@edit');



// Route::get('/hi', function () {
//     // return view('welcome');
//     return "<h1>hello world</h1>";
// });

// Route::get('/about', function () {
//     // return view('welcome');
//     return view('pages.about');
// });

// Route::get('/users/{id}', function ($id) {
//     // return view('welcome');
//     return "this is a fucking " . $id;
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', 'App\Http\Controllers\PostsController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
