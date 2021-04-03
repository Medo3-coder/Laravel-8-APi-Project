<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/about' , 'TestController1@index')->name('about');



// route group example
Route::group(['prefix'=>'account'], function()
{
    Route::get('/register' , 'TestController1@register');
    Route::get('/login' , 'TestController1@login');
});


//form

Route::get('/test/create' , 'TestController1@create');
Route::post('/test/store' , 'TestController1@store')->name('test.store');


//posts


Route::get('posts/store','PostController@store');

Route::get('posts','PostController@index');
Route::get('posts/{id}','PostController@show');

Route::get('posts/update/{id}','PostController@update');

Route::get('posts/delete/{id}','PostController@delete');

Route::get('/show','PostController@getPost');


// Route::get('account/register' , 'TestController1@register');
// Route::get('account/login' , 'TestController1@login');

//Route::get('/me',  [App\Http\Controllers\TestController1::class, 'index']);
//Route::get('/about' , [App\Http\Controllers\TestController1::class  , 'index']);


//Route::get('/about', 'App\Http\Controllers\TestController1@index'); it works


