<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes arela loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello',function(){
	return "hello laravel  5.3";
});

Route::get('form1','Auth\LoginController@form1');

//required parameters
route::get('blog/{id}',function($id){
	return "my ID :" . $id;
});

//Optional parameter
// Route::get('profile/{id?}',function($id=null){
// 	return "my ID :".$id;
// });

Route::resource('blog','BlogController');
Route::resource('comment','CommentController');


//Rerular Expresion
Route::get('book/{name}',function($name){
	return "my id : ".$name;
})->where('name','[A-Za-z]+');

Route::match(['get','post'],'bill',function(){
	if(Request::isMethod('get')){
		return 'This get method';
	}
	if(Request::isMethod('post')){
		return 'This posr method';
	}
});

Route::any('poll','Auth\LoginController@poll');

Route::get('Movie','MovieController@index');
Route::get('view','MovieController@view');
Route::get('song','Music\SongController@index');
Route::get('songplay','Music\SongController@play');
Route::get('radio','RadioController@index');

Route::get('band','Music\SongController@band');


Route::resource('lib','LibController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
