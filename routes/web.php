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
        
        switch (Auth::user()->hasRole->name) {
                //segun rol redirecciono al dashboard
                case 'admin':
                    return redirect()->action('HomeController@index');
                    break;
                
                case 'teacher':
                    return redirect()->action('HomeController@indexTeacher');
                    //return view('/site/home');
                    break;

                case 'public':
                    return redirect()->action('HomeController@indexPublic');
                    break;
        }    
    	
    } else{
        return view('/');
    }
});

Route::get('/dashboard', function () {
    if(Auth::check()){
        switch (Auth::user()->hasRole->name) {
                //segun rol redirecciono al dashboard
                case 'admin':
                    return redirect()->action('HomeController@index');
                    break;
                
                case 'teacher':
                    return redirect()->action('HomeController@indexTeacher');
                    //return view('/site/home');
                    break;

                case 'public':
                    return redirect()->action('HomeController@indexPublic');
                    break;
        }    
    } else{
        return view('/');
    }
});



Auth::routes();

//************* dashboard **************///
Route::get('/admin', 'HomeController@index')->middleware('validRole:admin');
Route::get('/profesor', 'HomeController@indexTeacher')->middleware('validRole:teacher');
Route::get('/publico', 'HomeController@indexPublic')->middleware('validRole:public');



//para ver perfil
Route::get('profile', function () {
    if(Auth::check()){
    	return view('users.profile', ['user' => Auth::user() ]);
    }else{
        return view('/site/home');
    }
});

//************* users **************///
Route::resource('users', 'UserController')->middleware('validRole:admin');
//para actualizar foto avatar
Route::post('profile', 'UserController@update_avatar')->middleware('auth');
//************ blog *****************//

//category
Route::resource('categories', 'CategoriesController')->middleware('validRole:admin');
//post
Route::resource('posts', 'PostsController')->middleware('validRole:admin');
//gallery
Route::resource('galleries', 'GalleriesController')->middleware('validRole:admin');
//tags
Route::resource('tags', 'TagsController')->middleware('validRole:admin');
//taller
Route::resource('workshops', 'WorkshopsController')->middleware('validRole:admin.teacher');
//banner
Route::resource('banners', 'BannersController')->middleware('validRole:admin');
//Route::post('workshops/update', 'WorkshopsController@update')->middleware('auth');

Route::get('disciplina/{slug}', ['as' => 'workshops', 'uses' => 'WorkshopsController@show']);

//lesson
Route::resource('lessons', 'LessonsController');    
Route::resource('students', 'StudentsController');
//registro
//Route::resource('registro/', 'StudentsController');
//Route::get('/registro/store', 'StudentsController@store');
Route::get('/registro/{slug}', ['as' => 'students', 'uses' => 'StudentsController@probar']);

Route::get('codeverify', ['as' => 'students', 'uses' => 'HomeController@codeVerify']);



/***************** Public site  ***********************/

Route::get('/', 'HomeController@indexSite');
Route::get('/home', 'HomeController@indexSite');
Route::get('/nosotros', 'HomeController@about');
Route::get('/equipo', 'HomeController@team');
Route::get('/contacto', 'HomeController@contact');
Route::post('/contacto/enviar', 'HomeController@sendContact');
Route::get('/disciplinas', 'HomeController@aboutWorkshop');

//disciplinas
Route::get('/nuevas-disciplinas', 'HomeController@newsWorkshops');
Route::get('/todas-las-disciplinas', 'HomeController@workshopsAll');


// blog publico
//detalle de noticia
Route::get('{category}/detalle/{slug}', ['as' => 'post', 'uses' => 'HomeController@showPostDetail']);
//listado por categoria
Route::get('/publicaciones/{category}', 'HomeController@indexPosts');

//index todas las categorias
Route::get('publicaciones/', 'HomeController@indexPosts');


