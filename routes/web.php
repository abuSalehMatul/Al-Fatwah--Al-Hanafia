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
    'middleware' => 'setlocale'
], function () {
    //
    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::get('/category/{id}', 'CategoryController@showByCategory');
    Route::get('get-question-answer/{questionId}', 'QuestionsController@getAnswerByQuestion')->name('question.answer');
    Route::get('answer/{batchId}', 'AnswerController@findAnswer');
    Route::get('new-ans-list', 'AnswerController@getList')->name('new_answer_list');

    Route::group(['middleware' => 'auth'], function () {
        //
        Route::resource('questions', 'QuestionsController');
    });


    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index');
    });
});


Route::group(['prefix' => 'api'], function () {
    Route::get('get-category', 'CategoryController@getAll');
    Route::get('new-answers', 'AnswerController@newAnswers');
    Route::get('selected-question', 'QuestionsController@getSelectedQuestion');
    Route::get('get-category-based-question/{catId}', 'CategoryController@getQuestionByCategory');
});
