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


//************* users **************///
Route::resource('users', 'UserController')->middleware('auth');

//para ver perfil
Route::get('profile', function () {
    if(Auth::check()){
    	return view('users.profile', ['user' => Auth::user() ]);
    }else{
        return view('/site/home');
    }
});
//para actualizar foto avatar
Route::post('profile', 'UserController@update_avatar')->middleware('auth');;

//************ blog *****************//

//category
Route::resource('categories', 'CategoriesController')->middleware('auth');;
//post
Route::resource('posts', 'PostsController')->middleware('auth');;
//gallery
Route::resource('galleries', 'GalleriesController')->middleware('auth');;
//tags
Route::resource('tags', 'TagsController');;
//taller
Route::resource('talleres', 'WorkshopsController');
//registro
Route::resource('registro', 'StudentController');
Route::get('/registro/exitoso', 'WorkshopsController@exitoso');
Route::resource('tags', 'TagsController')->middleware('auth');;




/***************** Public site  ***********************/

Route::get('/site', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about');
