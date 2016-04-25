<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'as'   => 'home',
	'uses' => 'HomeController@index'
]);

Route::get('bootstrap', [
	'as' => 'bootstrap',
	'uses' => 'HomeController@bootstrap'
]);

/*===============================================*/
/*========== routing de page dashboard ========*/
/*===============================================*/

Route::get('/dashboard', [
	'as'   => 'dashboard',
	'uses' => 'DashboardController@dashboard'
]);

/*=========== routing de page contact ============*/

Route::post('/sendMail', [
	'as' => 'send.email',
	'uses' => 'HomeController@sendMail'
]);


/*===============================================*/
/*=========== routing de page account ===========*/
/*===============================================*/

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard/account'], function(){

	route::get('/profile',[
		'as'   => 'account.profile',
		'uses' => 'UserController@profile'
	]);

	route::get('/setting',[
		'as'   => 'account.settings',
		'uses' => 'UserController@settings'
	]);

	route::post('/update',[
		'as'   => 'account.update',
		'uses' => 'UserController@update'
	]);

	route::get('/change_password',[
		'as'   => 'account.change_password',
		'uses' => 'UserController@changePassword'
	]);

	route::post('/update_password',[
		'as'   => 'account.update_password',
		'uses' => 'UserController@updatePassword'
	]);
});

/*===============================================*/
/*========== routing de page competences ========*/
/*===============================================*/

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard/competences'], function(){

	Route::get('/index', [
		'as'   => 'competences.index',
		'uses' => 'CompetencesController@index'
	]);

	Route::get('/create', [
		'as'   => 'competences.create',
		'uses' => 'CompetencesController@create'
	]);

	Route::post('/store', [
		'as'   => 'competences.store',
		'uses' => 'CompetencesController@store'
	]);

	Route::get('/show/{id}', [
		'as'   => 'competences.show',
		'uses' => 'CompetencesController@show'
	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [
		'as'   => 'competences.edit',
		'uses' => 'CompetencesController@edit'
	])->where('id', '[0-9]+');

	Route::post('/update/{id}', [
		'as'   => 'competences.update',
		'uses' => 'CompetencesController@update'
	])->where('id', '[0-9]+');

	Route::get('/destroy/{id}', [
		'as'   => 'competences.destroy',
		'uses' => 'CompetencesController@destroy'
	])->where('id', '[0-9]+');
});

/*===============================================*/
/*========== routing de page experiences ========*/
/*===============================================*/

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard/experiences'], function(){

	Route::get('/index', [
		'as'   => 'experiences.index',
		'uses' => 'ExperiencesController@index'
	]);

	Route::get('/create', [
		'as'   => 'experiences.create',
		'uses' => 'ExperiencesController@create'
	]);

	Route::post('/store', [
		'as'   => 'experiences.store',
		'uses' => 'ExperiencesController@store'
	]);

	Route::get('/show/{id}', [
		'as'   => 'experiences.show',
		'uses' => 'ExperiencesController@show'
	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [
		'as'   => 'experiences.edit',
		'uses' => 'ExperiencesController@edit'
	])->where('id', '[0-9]+');

	Route::post('/update/{id}', [
		'as'   => 'experiences.update',
		'uses' => 'ExperiencesController@update'
	])->where('id', '[0-9]+');

	Route::get('/destroy/{id}', [
		'as'   => 'experiences.destroy',
		'uses' => 'ExperiencesController@destroy'
	])->where('id', '[0-9]+');
});

/*===============================================*/
/*========== routing de page formation ========*/
/*===============================================*/

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard/formation'], function(){

	Route::get('/index', [
		'as'   => 'formation.index',
		'uses' => 'FormationController@index'
	]);

	Route::get('/create', [
		'as'   => 'formation.create',
		'uses' => 'FormationController@create'
	]);

	Route::post('/store', [
		'as'   => 'formation.store',
		'uses' => 'FormationController@store'
	]);

	Route::get('/show/{id}', [
		'as'   => 'formation.show',
		'uses' => 'FormationController@show'
	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [
		'as'   => 'formation.edit',
		'uses' => 'FormationController@edit'
	])->where('id', '[0-9]+');

	Route::post('/update/{id}', [
		'as'   => 'formation.update',
		'uses' => 'FormationController@update'
	])->where('id', '[0-9]+');

	Route::get('/destroy/{id}', [
		'as'   => 'formation.destroy',
		'uses' => 'FormationController@destroy'
	])->where('id', '[0-9]+');
});

/*===============================================*/
/*========== routing de page loisier ========*/
/*===============================================*/

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard/loisier'], function(){

	Route::get('/index', [
		'as'   => 'loisier.index',
		'uses' => 'LoisierController@index'
	]);

	Route::get('/create', [
		'as'   => 'loisier.create',
		'uses' => 'LoisierController@create'
	]);

	Route::post('/store', [
		'as'   => 'loisier.store',
		'uses' => 'LoisierController@store'
	]);

	Route::get('/show/{id}', [
		'as'   => 'loisier.show',
		'uses' => 'LoisierController@show'
	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [
		'as'   => 'loisier.edit',
		'uses' => 'LoisierController@edit'
	])->where('id', '[0-9]+');

	Route::post('/update/{id}', [
		'as'   => 'loisier.update',
		'uses' => 'LoisierController@update'
	])->where('id', '[0-9]+');

	Route::get('/destroy/{id}', [
		'as'   => 'loisier.destroy',
		'uses' => 'LoisierController@destroy'
	])->where('id', '[0-9]+');
});

/*===============================================*/
/*========== routing de page langue ========*/
/*===============================================*/

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard/langue'], function(){

	Route::get('/index', [
		'as'   => 'langue.index',
		'uses' => 'LangueController@index'
	]);

	Route::get('/create', [
		'as'   => 'langue.create',
		'uses' => 'LangueController@create'
	]);

	Route::post('/store', [
		'as'   => 'langue.store',
		'uses' => 'LangueController@store'
	]);

	Route::get('/show/{id}', [
		'as'   => 'langue.show',
		'uses' => 'LangueController@show'
	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [
		'as'   => 'langue.edit',
		'uses' => 'LangueController@edit'
	])->where('id', '[0-9]+');

	Route::post('/update/{id}', [
		'as'   => 'langue.update',
		'uses' => 'LangueController@update'
	])->where('id', '[0-9]+');

	Route::get('/destroy/{id}', [
		'as'   => 'langue.destroy',
		'uses' => 'LangueController@destroy'
	])->where('id', '[0-9]+');
});

/*===============================================*/
/*========== routing de page langue ========*/
/*===============================================*/

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard/experiences_competences'], function(){

	Route::get('/index', [
		'as'   => 'exp_comp.index',
		'uses' => 'Exp_compController@index'
	]);

	Route::get('/create/{id}', [
		'as'   => 'exp_comp.create',
		'uses' => 'Exp_compController@create'
	]);

	Route::post('/store', [
		'as'   => 'exp_comp.store',
		'uses' => 'Exp_compController@store'
	]);

	Route::get('/show/{id}', [
		'as'   => 'exp_comp.show',
		'uses' => 'Exp_compController@show'
	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [
		'as'   => 'exp_comp.edit',
		'uses' => 'Exp_compController@edit'
	])->where('id', '[0-9]+');

	Route::post('/update/{id}', [
		'as'   => 'exp_comp.update',
		'uses' => 'Exp_compController@update'
	])->where('id', '[0-9]+');

	Route::get('/destroy/{id}', [
		'as'   => 'exp_comp.destroy',
		'uses' => 'Exp_compController@destroy'
	])->where('id', '[0-9]+');
});

/*========================================*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
