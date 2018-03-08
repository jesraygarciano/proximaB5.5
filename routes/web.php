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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'HomeController@welcome');
Route::get('/', 'HomeController@welcome')->name('home');


Route::group(['middleware'=>'auth', 'prefix'=>'itp'], function(){

	Route::group(['prefix'=>'applicant'], function(){

		Route::get('profile',['as'=>'itp_applicant_profile', 'uses'=>'InternshipController@userItpProfile']);
		Route::get('create/{id?}',['as'=>'itp_create','uses'=>'InternshipController@create']);
		Route::get('add/{id?}',['as'=>'itp_add','uses'=>'InternshipController@add_batch']);

		Route::post('save/application',['as'=>'save_application', 'uses'=> 'InternshipController@save_application']);
		Route::post('addbatch/application',['as'=>'save_batches', 'uses'=> 'InternshipController@save_batches']);		
		Route::post('update/application',['as'=>'update_application', 'uses'=> 'InternshipController@update_application']);

		// json
		Route::group(['prefix'=>'json'],function(){
			Route::get('itp',['as'=>'json_get_itp_application', 'uses'=>'InternshipController@json_get_application_datatable']);
			Route::post('delete',['as'=>'json_delete_itp_application', 'uses'=>'InternshipController@json_delete_application']);
		});
	});
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
