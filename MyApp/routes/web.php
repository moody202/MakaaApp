<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::prefix('components.pages')->middleware(['auth'])->group(function () {
//     Route::get('/about',function(){
//         return view('about');
//     });
//     Route::get('/create',function(){
//         return view('create');
//     });


// });



Route::get('/about', function () {
    return view('components.pages.about');
})->middleware(['auth'])->name('about');
Route::get('/create', function () {
    return view('components.pages.create');
})->middleware(['auth'])->name('create');
Route::get('/index', function () {
    return view('components.post.index');
})->middleware(['auth'])->name('index');


require __DIR__.'/auth.php';


Route::get('/index', function (){
    return 'welcome in my web application';
});

Route::resource('contacts', ContactController::class);

// Route::get('contacts','ContactController@index');
// Route::get('contacts','ContactController@create');
// Route::get('contacts','ContactController@store');

Route::resource('posts',PostController::class);

// Route::resource([
//     'contacts'=> ContactController::class,
//     'posts'=>PostController::class
// ]);
Route::resource('products',ProductController::class);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::get('/about', function () {
    return view('components.pages.about');
})->middleware(['auth'])->name('about');
Route::get('/create', function () {
    return view('components.pages.create');
})->middleware(['auth'])->name('create');
Route::get('/index', function () {
    return view('components.post.index');
})->middleware(['auth'])->name('index');


Route::resource('products',ProductController::class);
Route::resource('posts',PostController::class);
Route::resource('contacts', ContactController::class);



Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

    });
