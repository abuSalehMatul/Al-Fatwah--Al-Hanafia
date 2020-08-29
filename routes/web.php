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
Route::get('/', 'HomeController@redirectToHome');

//
Route::group([
	'prefix' => '{locale}', 
	'where' => ['locale' => '[a-zA-Z]{2}'],
	'middleware' => 'setlocale'], function() {
    //
    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::get('/question/{id}', 'HomeController@questionView')->name('question.view');

    Route::group(['middleware' => 'auth', 'namespace' => 'Frontend'], function() {
        //
        Route::resource('questions', 'QuestionsController');
    });


    Route::prefix('admin')->group(function(){
        Route::get('/', 'AdminController@index');
    });
});

