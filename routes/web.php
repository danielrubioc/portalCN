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
    if(Auth::check()){
    	return view('/home');
    }else{
        return view('/site/home');
    }


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//************* users **************///
Route::resource('users', 'UserController');

//para ver perfil
Route::get('profile', function () {
    if(Auth::check()){
    	return view('users.profile', ['user' => Auth::user() ]);
    }else{
        return view('/site/home');
    }
});
//para actualizar foto avatar
Route::post('profile', 'UserController@update_avatar');

//************ blog *****************//
//category
Route::resource('categories', 'CategoriesController');
//post
Route::resource('posts', 'PostsController');
//gallery
Route::resource('galleries', 'GalleriesController');
//tags
Route::resource('tags', 'TagsController');