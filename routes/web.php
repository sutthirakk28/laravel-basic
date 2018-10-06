<?php

// use App\Lib;
// use App\Http\Resources\User as UserResource;
// use App\Http\Resources\UserCollection;
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
//login
Route::get('/', function () {
    return view('auth/login');
});
Route::post('logout', '/Auth/LoginController@logout')->name('logout');
Auth::routes();

//Export excel
Route::get('export-excel-admin', 'ExportController@exportExcelAdmin')->name('export.exceladmin');
Route::get('export-excel-depar', 'ExportController@exportExcelDep')->name('export.exceldep');
Route::get('export-excel-posi', 'ExportController@exportExcelPos')->name('export.excelpos');
Route::get('export-excel-emplo', 'ExportController@exportExcelLib')->name('export.excellib');
Route::get('export-excel-tomonth', 'ExportController@exportExcelTomonth')->name('export.exceltomonth');

//Export PDF
Route::get('/pdf/pdf_user', 'PDFController@pdf_user');
Route::get('/pdf/pdf_dep', 'PDFController@pdf_dep');
Route::get('/pdf/pdf_pos', 'PDFController@pdf_pos');
Route::get('/pdf/pdf_lib', 'PDFController@pdf_lib');
Route::get('/pdf/pdf_leave', 'PDFController@pdf_leave');

//admin
Route::resource('manage_Users', 'UserController');
Route::get('/profile', 'UserController@profile');

//sms
Route::post('/nexmo', 'UserController@nexmo');


//line
Route::get('/line/line/{id?}', 'LineController@line');
Route::get('/line/index/{id?}', 'LineController@create');

//mail
Route::get('/sendbasicemail','MailController@basic_email');
Route::get('/sendhtmlemail','MailController@html_email');
Route::get('/sendattachmentemail/{id?}','MailController@attachment_email');

//home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/sum_leave', 'HomeController@sum_leave');
Route::get('/home/sum_admin', 'HomeController@sum_admin');
Route::get('/home/sum_per', 'HomeController@sum_per');
Route::get('/home/sum_task', 'HomeController@sum_task');
Route::get('/home/list_leave', 'HomeController@list_leave');

//lib
Route::resource('lib','LibController');

//dep
Route::resource('dep','DepController');

//pos
Route::resource('pos','PosController');

//leave
Route::resource('leave','LeaveController');
Route::get('leave/report/{id}', 'LeaveController@report');
Route::get('/getFormScore', 'LeaveController@getFormScore');
Route::post('/getDataScore', 'LeaveController@getDataScore');

//tasks
Route::resource('tasks', 'TasksController');
Route::post('/tasks/store', 'TasksController@store');
Route::post('/tasks/edit_task', 'TasksController@edit_task');
Route::post('/tasks/destroy', 'TasksController@destroy');

//addon
Route::get('addon/gallery','AddonController@gallery');
Route::get('addon/chat','AddonController@chat');
Route::get('addon/graph','AddonController@graph');
Route::get('addon/organiz','AddonController@organiz');
Route::get('addon/apiFetchdata','AddonController@index');

//posts
Route::resource('/posts', 'PostController');
Route::get('/published', 'PostController@published');


/*
//test
Route::get('hello',function(){
	return "hello laravel  5.3";
});
Route::get('form1','Auth\LoginController@form1');
//required parameters
route::get('blog/{id}',function($id){
	return "my ID :" . $id;
});
Route::resource('blog','BlogController');
Route::resource('comment','CommentController');
//Optional parameter
Route::get('profile/{id?}',function($id=null){
	return "my ID :".$id;
});
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
Route::get('/news','NewsController@index');
Route::get('/news/form','NewsController@form');
Route::get('/news/form','NewsController@form')->middleware('auth');
Route::get('/json',function(){
	//$user = Lib::paginate(10);
	$user = Lib::all();
	return new UserCollection($user);
	//return new UserResource($user);
	//return new UserResource(User::find(2)); 
});
*/