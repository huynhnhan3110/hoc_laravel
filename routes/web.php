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
    return view('welcome');
});


Route::group(
	['prefix' => '/article'],
	function() {
		Route::get('/create/form', 'ArticleController@showForm');
		Route::post('/create', 'ArticleController@create')->name('createArticle');
		
		Route::get('/edit/{id}', 'ArticleController@showEditForm')->name('articleEdit');
		Route::get('/detail/{id}', 'ArticleController@get')->name('detail');

		Route::get('/list', 'ArticleController@showListPage')->name('articleListPage');
		Route::post('/update', 'ArticleController@update')->name('articleUpdate');
		Route::get('/delete', 'ArticleController@delete')->name('articleDelete');
	}
);
Route::group(
	['prefix' => '/api'],
	function() {
		Route::get('/list', 'ArticleController@list')->name('articleList');
		Route::post('/delete', 'ArticleController@delete')->name('articleDelete');
		Route::post('/update', 'ArticleController@update')->name('articleUpdate');
	}
);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
