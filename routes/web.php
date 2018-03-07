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

Auth::routes();

//dashboard para todos 
Route::get('/dashboard', 'HomeController@index')->name('home.dashboard')->middleware('auth');

//************* users **************///
Route::resource('users', 'UserController')->middleware('validRole:admin');
//rutas perfil
Route::get('/profile/show', 'UserController@profile')->name('users.profile')->middleware('auth');
Route::post('profile', 'UserController@update_avatar')->name('users.profileAvatarUpdate')->middleware('auth');
Route::put('/profile/update', 'UserController@update_profile')->name('users.profileUpdate')->middleware('auth');

//************ blog *****************//

//category
Route::resource('categories', 'CategoriesController')->middleware('validRole:admin.publisher');
//post
Route::resource('posts', 'PostsController')->middleware('validRole:admin.publisher');
//gallery
Route::resource('galleries', 'GalleriesController')->middleware('validRole:admin.publisher');
//tags
Route::resource('tags', 'TagsController')->middleware('validRole:admin.publisher');
//taller
Route::resource('workshops', 'WorkshopsController')->middleware('validRole:admin.teacher');
Route::get('/workshops/students/{idWork}', 'WorkshopsController@registerStudent')->name('workshops.registerStudent')->middleware('validRole:admin.teacher');
Route::post('/workshops/store', 'WorkshopsController@storeStudent')->name('workshops.storeStudent')->middleware('validRole:admin.teacher');
Route::get('/workshops/listStudent/{idWork}', 'WorkshopsController@listStudent')->name('workshops.listStudent');
Route::delete('/workshops/students/destoy/{idUser}', 'WorkshopsController@destroyStudent')->name('workshops.destroyStudent')->middleware('validRole:admin.teacher');
//banner
Route::resource('banners', 'BannersController')->middleware('validRole:admin.publisher');
//Route::post('workshops/update', 'WorkshopsController@update')->middleware('auth');

//lesson
Route::resource('lessons', 'LessonsController');    
Route::resource('students', 'StudentsController');
Route::get('/registro/{slug}', ['as' => 'students', 'uses' => 'StudentsController@probar']);


/***************** Public site  ***********************/

Route::get('/', 'HomeController@indexSite');
Route::get('/home', 'HomeController@indexSite');
Route::get('/nosotros', 'HomeController@about');
Route::get('/equipo', 'HomeController@team');
Route::get('/contacto', 'HomeController@contact');
Route::post('/contacto/enviar', 'HomeController@sendContact');
Route::get('/disciplinas', 'HomeController@workshopsAll');

Route::get('/activacion', 'HomeController@activateUser');
Route::post('/codeVerify', 'HomeController@codeVerify');

//disciplinas
Route::get('/nuevas-disciplinas', 'HomeController@newsWorkshops');
Route::get('/todas-las-disciplinas', 'HomeController@workshopsAll');
Route::get('disciplina/{slug}', ['as' => 'workshops', 'uses' => 'HomeController@showWorkshopDetail']);

// blog publico
//detalle de noticia
Route::get('{category}/detalle/{slug}', ['as' => 'post', 'uses' => 'HomeController@showPostDetail']);
//listado por categoria
Route::get('/publicaciones/{category}', 'HomeController@indexPosts');

//index todas las categorias
Route::get('publicaciones/', 'HomeController@indexPosts');


