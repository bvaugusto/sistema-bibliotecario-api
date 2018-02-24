<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'home'], function(){

    //Routes Home
    Route::get('', 'HomeController@index');
    Route::get('create', 'HomeController@create');
    Route::post('', 'HomeController@store');
    Route::get('{home}', 'HomeController@show');
    Route::get('{home}/edit', 'HomeController@edit');
//    Route::post('{home}', 'HomeController@update');
    Route::put('{home}', 'HomeController@update');
    Route::delete('{home}', 'HomeController@destroy');

});

Route::group(['prefix' => 'autor'], function(){

    //Routes Autor
    Route::get('', 'AutorController@index');
    Route::get('create', 'AutorController@create');
    Route::post('', 'AutorController@store');
    Route::get('{autor}', 'AutorController@show');
    Route::get('{autor}/edit', 'AutorController@edit');
    Route::put('{autor}', 'AutorController@update');
    Route::delete('{autor}', 'AutorController@destroy');

});

Route::group(['prefix' => 'categoria'], function(){

    //Routes Categoria
    Route::get('', 'CategoriaController@index');
    Route::get('create', 'CategoriaController@create');
    Route::post('', 'CategoriaController@store');
    Route::get('{categoria}', 'CategoriaController@show');
    Route::get('{categoria}/edit', 'CategoriaController@edit');
    Route::put('{categoria}', 'CategoriaController@update');
    Route::delete('{categoria}', 'CategoriaController@destroy');

});

Route::group(['prefix' => 'leitor'], function(){

    //Routes Leitor
    Route::get('', 'LeitorController@index');
    Route::get('create', 'LeitorController@create');
    Route::post('', 'LeitorController@store');
    Route::get('{leitor}', 'LeitorController@show');
    Route::get('{leitor}/edit', 'LeitorController@edit');
    Route::put('{leitor}', 'LeitorController@update');
    Route::delete('{leitor}', 'LeitorController@destroy');

});

Route::group(['prefix' => 'livro'], function(){

    //Routes Livro
    Route::get('', 'LivroController@index');
    Route::get('create', 'LivroController@create');
    Route::post('', 'LivroController@store');
    Route::get('{livro}', 'LivroController@show');
    Route::get('{livro}/edit', 'LivroController@edit');
    Route::put('{livro}', 'LivroController@update');
    Route::delete('{livro}', 'LivroController@destroy');

});

Route::group(['prefix' => 'editora'], function(){

    //Routes Editora
    Route::get('', 'EditoraController@index');
    Route::get('create', 'EditoraController@create');
    Route::post('', 'EditoraController@store');
    Route::get('{editora}', 'EditoraController@show');
    Route::get('{editora}/edit', 'EditoraController@edit');
    Route::put('{editora}', 'EditoraController@update');
    Route::delete('{editora}', 'EditoraController@destroy');

});

Route::group(['prefix' => 'emprestimo'], function(){

    //Routes Emprestimo
    Route::get('', 'EmprestimoController@index');
    Route::get('create', 'EmprestimoController@create');
    Route::post('', 'EmprestimoController@store');
    Route::get('{emprestimo}', 'EmprestimoController@show');
    Route::get('{emprestimo}/edit', 'EmprestimoController@edit');
    Route::put('{emprestimo}', 'EmprestimoController@update');
    Route::delete('{emprestimo}', 'EmprestimoController@destroy');

});

Route::group(['prefix' => 'exemplar'], function(){

    //Routes Emprestimo
    Route::get('', 'ExemplarController@index');
    Route::get('create', 'ExemplarController@create');
    Route::post('', 'ExemplarController@store');
    Route::get('{exemplar}', 'ExemplarController@show');
    Route::get('{exemplar}/edit', 'ExemplarController@edit');
    Route::put('{exemplar}', 'ExemplarController@update');
    Route::delete('{exemplar}', 'ExemplarController@destroy');

});

Route::group(['prefix' => 'status'], function(){

    //Routes Emprestimo
    Route::get('', 'StatusController@index');
    Route::get('create', 'StatusController@create');
    Route::post('', 'StatusController@store');
    Route::get('{status}', 'StatusController@show');
    Route::get('{status}/edit', 'StatusController@edit');
    Route::put('{status}', 'StatusController@update');
    Route::delete('{status}', 'StatusController@destroy');

});

Route::group(['prefix' => 'status-livro'], function(){

    //Routes Emprestimo
    Route::get('', 'StatusLivroController@index');
    Route::get('create', 'StatusLivroController@create');
    Route::post('', 'StatusLivroController@store');
    Route::get('{statuslivro}', 'StatusLivroController@show');
    Route::get('{statuslivro}/edit', 'StatusLivroController@edit');
    Route::put('{statuslivro}', 'StatusLivroController@update');
    Route::delete('{statuslivro}', 'StatusLivroController@destroy');

});

//Route::resource('categoria', 'CategoriaController');
