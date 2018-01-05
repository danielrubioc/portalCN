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
        
        switch (Auth::user()->role_id) {
                //segun rol redirecciono al dashboard
                case '1':
                    return redirect()->action('HomeController@index');
                    break;
                
                case '2':
                    return redirect()->action('HomeController@indexTeacher');
                    //return view('/site/home');
                    break;

                case '3':
                    return redirect()->action('HomeController@indexPublic');
                    break;
        }    
    	
    }else{
        return view('/home');
    }
});


Auth::routes();

//************* dashboard **************///
Route::get('/admin', 'HomeController@index')->middleware('auth');
Route::get('/profesor', 'HomeController@indexTeacher')->middleware('auth');
Route::get('/publico', 'HomeController@indexPublic')->middleware('auth');

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
Route::post('profile', 'UserController@update_avatar')->middleware('auth');

//************ blog *****************//

//category
Route::resource('categories', 'CategoriesController')->middleware('auth');
//post
Route::resource('posts', 'PostsController')->middleware('auth');
//gallery
Route::resource('galleries', 'GalleriesController')->middleware('auth');
//tags
Route::resource('tags', 'TagsController');
//taller
Route::resource('workshops', 'WorkshopsController');
Route::resource('talleres', 'WorkshopsController');
//lesson
Route::resource('lessons', 'LessonsController');
//registro
Route::resource('registro', 'StudentController');
Route::get('/registro/exitoso', 'WorkshopsController@exitoso');
Route::resource('tags', 'TagsController')->middleware('auth');




/***************** Public site  ***********************/

Route::get('/home', 'HomeController@indexSite');
Route::get('about', 'HomeController@about');
