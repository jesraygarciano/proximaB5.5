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

// Route::get('/', 'HomeController@welcome');
Route::get('/', 'HomeController@welcome')->name('home');


Route::group(['prefix'=>'itp'], function(){

	Route::get('itp/create/{id?}',['as'=>'itp_create','uses'=>'InternshipController@create']);

	Route::group(['middleware'=>'auth', 'prefix'=>'applicant'], function(){

		Route::get('profile',['as'=>'itp_applicant_profile', 'uses'=>'InternshipController@userItpProfile']);
		Route::get('finprofile',['as'=>'itp_applicant_finprofile', 'uses'=>'InternshipController@finuserItpProfile']);

		Route::get('add/{id?}',['as'=>'itp_add','uses'=>'InternshipController@add_batch']);

		Route::post('save/application',['as'=>'save_application', 'uses'=> 'InternshipController@save_application']);
		Route::post('addbatch/application',['as'=>'save_batches', 'uses'=> 'InternshipController@save_batches']);		
		Route::post('update/application',['as'=>'update_application', 'uses'=> 'InternshipController@update_application']);

		// json
		Route::group(['prefix'=>'json'],function(){
			Route::get('itp',['as'=>'json_get_itp_application', 'uses'=>'InternshipController@json_get_application_datatable']);
			Route::post('delete',['as'=>'json_delete_itp_application', 'uses'=>'InternshipController@json_delete_application']);

			Route::group(['prefix'=>'resume/parts'], function(){
				Route::group(['prefix'=>'get'], function(){
					// ... get resume parts routes
					Route::get('group_info',['as'=>'j_g_r_group_info', 'uses'=>'UserController@returResumeGroupInfo']);
				});
				Route::group(['prefix'=>'edit'], function(){
					Route::patch('basic',['as'=>'j_e_r_p_basic', 'uses'=>'UserController@edit_resume_basic']);
					Route::patch('skills',['as'=>'j_e_r_p_skills', 'uses'=>'UserController@edit_resume_skills']);
					Route::patch('company_experience',['as'=>'j_e_r_p_company_experiences', 'uses'=>'UserController@edit_resume_company_experience']);
					Route::patch('educational_background',['as'=>'j_e_r_p_educational_background', 'uses'=>'UserController@j_e_r_p_educational_background']);
					Route::patch('meta',['as'=>'j_e_r_p_meta', 'uses'=>'UserController@edit_resume_meta']);
				});
				Route::group(['prefix'=>'create'], function(){
					Route::patch('educational_background',['as'=>'j_c_r_p_educational_background', 'uses'=>'UserController@j_c_r_p_educational_background']);
				});
			});
		});
	});
});

Route::group(['prefix'=>'user', 'middleware'=>'auth'], function(){
	Route::get('profile', ['as'=>'user_profile', 'uses'=>'UserController@profile']);
	Route::get('resume/create', ['as'=>'resume_create', 'uses'=>'UserController@resume_create']);
	Route::get('resume/edit/{id}', ['as'=>'resume_edit', 'uses'=>'UserController@resume_edit']);
	Route::post('resume/save', ['as'=>'resume_save', 'uses'=>'UserController@resume_save']);
	Route::post('resume/save/edit', ['as'=>'resume_save_edit', 'uses'=>'UserController@resume_save_edit']);
});

// Socialite
Route::get('/redirect/{media}', 'SocialAuthController@redirect');
Route::get('/facebook/callback', 'SocialAuthController@callbackFacebook');
Route::get('/github/callback', 'SocialAuthController@callbackGithub');
Route::post('/confirm/role', 'UserController@confirm_role');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');