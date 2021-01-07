<?php

use Illuminate\Support\Facades\Route;

Route::any('products/search', 'ProductController@search')->name('products.search');
Route::get('products/{id}/muda', 'ProductController@muda')->name('products.muda')/*->middleware('auth')*/;
Route::get('products/{id}/altera', 'ProductController@altera')->name('products.altera')/*->middleware('auth')*/;
Route::resource('products', 'ProductController')->middleware('auth');
Route::get('/diretor', function () {
    return view('admin.pages.diretor');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/register', function () {
    return view('auth.register');
})->middleware(['auth', 'check.is.admin']);



/*
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

Route::put('products/{id}', 'ProductController@update')->name('products.update');

Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{id}', 'ProductController@show')->name('products.show');

Route::get('products', 'ProductController@index')->name('products.index');

Route::post('products', 'ProductController@store')->name('products.store');
*/

Route::get('/login', function(){
    return 'Login';
})->name('login');

/*Route::group([
    'middleware' => [],
], function () {

    Route::get('/produtos/{idProduct?}', function ($idProduct = ''){
        return "Produto(s) {$idProduct}";
    });
    
    Route::get('/operations', function () {
        return view('admin.operation');
    });
    
    Route::get('/cadpro', function () {
        return view('admin.cadpro');
    });
});
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index')->name('index');
