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
    return view('index');
});

Route::get('/landing', function () {
    return view('landing');
});



Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/edit', function () {
    return view('pages.edit');
});

Route::get('/create', function () {
    return view('pages.create');
});

//  Route::get('admin','AdminController@ShowString');

Route::get('/test/{id?}', function (){

    return 'myTest';

})->name('t');

// Route::namespace('Fornt')->group(function (){
//     Route::get('users','UserController@show');
// });


// Route::group(['prefix'=>'users'], function (){

//     Route::get('/',function(){
//         return 'Mahmoud Ayoub';
//     });

// });


// Route::get('/user/{id}', [UserController::class, 'show']);


// Route::resource('News', 'News');

Route::get('index','AdminController@getindex');
Route::get('/redirect/{serv}','SocilController@redirect');
Route::get('/callback/{serv}','SocilController@callback');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
