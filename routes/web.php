<?php

use Illuminate\Support\Facades\Route;

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
####################### LOGIN ROUTE #########################
	Route::get('/login', 'MainController@index')->name('login');
	Route::post('/login','MainController@check_login')->name('log');

##############################################################

Route::group(['middleware' => 'auth:web'],function(){

//main controllers
#######################################################

	################################################################################################
	
	Route::get('/', 'HomeController@index')->name('index');
	Route::get('/logout','MainController@logout')->name('logout');
	
	################################################################################################
	

	########################### ADMIN COSTS ########################################################
	
	Route::get('/admin_cost', 'AdminCostController@index')->name('index');
	Route::post('/admin_cost', 'AdminCostController@creat')->name('index');
	Route::get('/admin-del/{id}', 'AdminCostController@delete')->name('admin-del');
	
	################################################################################################

	########################### Department #########################################################
	
	Route::get('/department', 'DepartmentController@index')->name('department');
	Route::post('/department', 'DepartmentController@create')->name('department');
	Route::get('/department-del/{id}', 'DepartmentController@delete')->name('department-del');
	
	################################################################################################	
	
	########################### PLAYERS  ###########################################################
	Route::get('/players', 'playersController@index')->name('players');
	Route::post('/players', 'playersController@create')->name('players');
	Route::get('/player_del/{id}', 'playersController@delete')->name('player_del');
	################################################################################################	

	########################### Custmers  ##########################################################
	Route::get('/custmers', 'CustmersController@index')->name('custmers');
	Route::post('/custmers', 'CustmersController@create')->name('custmers');
	Route::get('cus-del/{id}','CustmersController@delete')->name('cus_delete');
	################################################################################################

	########################### Costs  #############################################################
	Route::get('/costs', 'CostsController@index')->name('costs');
	Route::post('/type', 'CostsController@AddType')->name('type');
	Route::post('/freq', 'CostsController@AddFreq')->name('freq');
	Route::post('/costs', 'CostsController@create')->name('costs');
	Route::get('cost-del/{id}','CostsController@delete')->name('cost_delete');
	################################################################################################

	########################### Projects  ##########################################################
	Route::get('/projects', 'ProjectsController@index')->name('projects');
	Route::post('/projects', 'ProjectsController@create')->name('project');
	Route::post('/pay', 'ProjectsController@AddPayment')->name('payment');
	Route::get('/project-print/{id}', 'ProjectsController@print')->name('pro-print');
	Route::get('/project-del/{id}', 'ProjectsController@delete')->name('project-del');
	################################################################################################

	########################### Settings  ##########################################################
	Route::get('/settings', 'SettingsController@index')->name('settings');
	Route::post('/password', 'SettingsController@pass')->name('password');
	Route::post('/bounce', 'SettingsController@bounce')->name('bounce');
	Route::post('/salary', 'SettingsController@salary')->name('salary');
	Route::get('bounce_delete/{id}','SettingsController@bounce_delete')->name('bounce_delete');
	Route::get('salary_delete/{id}','SettingsController@salary_delete')->name('salary_delete');
	################################################################################################

	###########################  Reports  ##########################################################
	Route::get('/revenue', 'ReportsController@index')->name('revenue');
	
	################################################################################################

#######################################################
});
	

