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
//dashboard para todos 
Route::get('/talleres-inscritos', 'HomeController@viewWorkshopsIns')->name('home.viewWorkshopsIns')->middleware('auth')->middleware('validRole:public');

//************* users **************///
Route::resource('users', 'UserController')->middleware('validRole:admin.attention');
Route::post('/registerUserAndWorkshop/store', 'UserController@registerUserAndWorkshop')->name('users.registerUserAndWorkshop');
Route::get('download-excel-file/users', array('as'=>'excel-file','uses'=>'UserController@export'))->middleware('validRole:admin.attention');
Route::post('upload-users', 'UserController@import')->middleware('validRole:admin.attention');
Route::post('update-users', 'UserController@importUpdate')->middleware('validRole:admin.attention');


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
//categorias talleres
Route::resource('workshopCategories', 'WorkshopCategoriesController')->middleware('validRole:admin.publisher');
//taller
Route::resource('workshops', 'WorkshopsController')->middleware('validRole:admin.teacher.publisher.attention');
Route::get('/workshops/students/{idWork}', 'WorkshopsController@registerStudent')->name('workshops.registerStudent')->middleware('validRole:admin.teacher.publisher.attention');
Route::post('/workshops/store', 'WorkshopsController@storeStudent')->name('workshops.storeStudent')->middleware('validRole:admin.teacher.publisher.attention');
Route::post('/workshops/storePublic', 'WorkshopsController@storeStudentPublicAuth')->name('workshops.storeStudentPublicAuth')->middleware('validRole:public');
Route::get('/workshops/listStudent/{idWork}', 'WorkshopsController@listStudent')->name('workshops.listStudent');
Route::delete('/workshops/students/destoy/{idUser}', 'WorkshopsController@destroyStudent')->name('workshops.destroyStudent')->middleware('validRole:admin.teacher.publisher');
//banner
Route::resource('banners', 'BannersController')->middleware('validRole:admin.publisher');
//Route::post('workshops/update', 'WorkshopsController@update')->middleware('auth');

//lesson
Route::resource('lessons', 'LessonsController');    
Route::get('/workshops/listAsisstance/{idWork}', 'LessonsController@listAssistance')->name('lessons.listAssistance')->middleware('validRole:admin.teacher.publisher');
Route::post('/workshops/listAsisstance/save', 'LessonsController@saveList')->name('lessons.saveList')->middleware('validRole:admin.teacher.publisher');
//class calendar
Route::get('/workshops/listClass/{idWork}', 'LessonsController@listLesson')->name('lessons.listLesson');
Route::post('/lessons/upload-lesson', 'LessonsController@import')->middleware('validRole:admin.attention');

Route::resource('students', 'StudentsController');
Route::get('/registro/{slug}', ['as' => 'students', 'uses' => 'StudentsController@probar']);


/***************** Public site  ***********************/

Route::get('/', 'HomeController@indexSite');
Route::get('/home', 'HomeController@indexSite');
Route::get('/nosotros', 'HomeController@about');
Route::get('/equipo', 'HomeController@team');
Route::get('/contacto', 'HomeController@contact');
Route::post('/contacto/enviar', 'HomeController@sendContact');
Route::get('/categorias', 'HomeController@categoriesWorkshopsAll');
//Route::get('/disciplinas', 'HomeController@workshopsAll');
Route::get('/disciplinas', 'HomeController@categoriesWorkshopsAll');

//Route::get('/activacion', 'HomeController@activateUser');
Route::get('/activacion', 'HomeController@activateUser')->name('home.activateUser');

Route::post('/codeVerify', 'HomeController@codeVerify');

//disciplinas
Route::get('/nuevas-disciplinas', 'HomeController@newsWorkshops');
Route::get('/todas-las-disciplinas', 'HomeController@workshopsAll');
Route::get('disciplina/{slug}', ['as' => 'workshops', 'uses' => 'HomeController@showWorkshopDetail']);
Route::get('disciplinas/{slug}', ['as' => 'workshops', 'uses' => 'HomeController@workshopsAllCategory']);

// blog publico
//detalle de noticia
Route::get('{category}/detalle/{slug}', ['as' => 'post', 'uses' => 'HomeController@showPostDetail']);
//listado por categoria
Route::get('/publicaciones/{category}', 'HomeController@indexPosts');

//index todas las categorias
Route::get('publicaciones/', 'HomeController@indexPosts');


