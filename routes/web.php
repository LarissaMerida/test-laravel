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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/posts')->group(function(){
    Route::get('', 'PostsController@listar');
    
    Route::get('/create', 'PostsController@criar');
    Route::post('/store', 'PostsController@salvar');
    Route::get('/edit/{id}', 'PostsController@editar');
    Route::post('/update/{id}', 'PostsController@atualizar');
    Route::get('/destroy/{id}', 'PostsController@deletar');
});
