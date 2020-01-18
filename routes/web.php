<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Http\Controllers\PostsController;

Route::prefix('api')->group(function (){
    Route::get('/posts/list','PostsController@list')->name('home');
    Route::get('/posts','PostsController@index');
    Route::get('/add','PostsController@add');
    Route::get('/posts/{id}','PostsController@fetch');
    Route::post('/posts','PostsController@store');
    Route::post('/posts/update/{id}','PostsController@update')->name('update_post');
    Route::get('/posts/edit/{id}', 'PostsController@edit');
    Route::get('/posts/show/{id}', 'PostsController@show');
    Route::delete('/posts/{id}','PostsController@delete');
});

Auth::routes();
Route::get('/','PostsController@list');
//Route::get('/home', 'HomeController@index')->name('home');
