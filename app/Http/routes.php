<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
     return redirect('/images');
});


Route::resource('Comment', 'CommentController');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Aqui está todas as rotas para as operações da galeria 
| para o funcionamento da aplicação, com descrição
|
*/

Route::get('/login',   ['as' => 'login.get',   'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login',  ['as' => 'login.post',  'uses' => 'Auth\AuthController@postLogin']);

Route::get('/register',   ['as' => 'register.get',   'uses' => 'Auth\AuthController@getRegister']);
Route::post('/register',  ['as' => 'register.post',  'uses' => 'Auth\AuthController@postRegister']);


Route::get('/logout', ['as' => 'logout.get',   'uses' => 'Auth\AuthController@getLogout']);




Route::group(['prefix' => 'images', 'middleware' => 'auth'], function() {   
    Route::get('', ['as' => 'images.index', 'uses' => 'ImageController@index']); // visualizar [Global]
});

/*
|--------------------------------------------------------------------------
| Image Routes
|--------------------------------------------------------------------------
|
| Aqui está todas as rotas para as operações da galeria 
| para o funcionamento da aplicação, com descrição
|
*/
Route::group(['prefix' => 'image', 'middleware' => 'auth'], function(){
    Route::get('/create',           ['as' => 'image.create',  'uses' => 'ImageController@create']);    // cadastrar[GET]
    Route::post('/create',          ['as' => 'image.store',   'uses' => 'ImageController@store']);     // cadastrar[POST]
    Route::get ('/{image}/show',    ['as' => 'image.show',    'uses' => 'ImageController@show']);      // Visualizar[GET]
    Route::post('/{image}/show',    ['as' => 'image.comment', 'uses' => 'CommentController@store']);
    Route::get('/{image}/edit',     ['as' => 'image.edit',    'uses' => 'ImageController@edit']);      // Editar[GET] 
    Route::post('/{image}/update',  ['as' => 'image.update',  'uses' => 'ImageController@update']);    // Atualizar[PATCH]
    Route::post('/{image}/delete',  ['as' => 'image.delete',  'uses' => 'ImageController@destroy']);   // Deletar[PATCH]
    Route::post('/search',          ['as' => 'image.search',  'uses' => 'ImageController@search']);    // Buscar[GET]
});

/*
|--------------------------------------------------------------------------
| My Routes
|--------------------------------------------------------------------------
|
| Aqui está todas as rotas para as operações da galeria 
| para o funcionamento da aplicação, com descrição
|
*/
Route::group(['prefix'  => 'myImages', 'middleware' => 'auth'], function(){
   Route::get('', ['as' => 'my.images', 'uses' => 'ImageController@myPics']);
});



/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
|
| Aqui está todas as rotas para as operações do Perfil
| para o funcionamento da aplicação, com descrição
|
*/
Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function(){
   Route::get('',            ['as' => 'profile.view',   'uses' => 'ProfileController@index']);   // Index
   Route::get('/edit',       ['as' => 'profile.edit',   'uses' => 'ProfileController@edit']);    // Editar[GET] 
   Route::post('/update',    ['as' => 'profile.update', 'uses' => 'ProfileController@update']);  // Editar[POST]
   Route::get('/{nickname}', ['as' => 'profile.show',   'uses' => 'ProfileController@show']);    // Visualizar 
});

