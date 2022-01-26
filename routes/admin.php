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

// Route::get('/', function () {
//     return view('index');
// });



// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('pages.contact');
// });

// Route::get('/edit', function () {
//     return view('pages.edit');
// });

// Route::get('/create', function () {
//     return view('pages.create');
// });
// Route::get('/admin', function () {
//     return 'admin';
// });

// Route::get('admin','AdminController@ShowString');

Route::get('/test/{id?}', function (){

    return 'myTest';

})->name('t');

