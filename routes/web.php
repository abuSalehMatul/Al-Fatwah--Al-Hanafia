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
    Route::get('get-question-answer/{questionId}', 'QuestionsController@getAnswerByQuestion')->name('question.answer')->middleware('count_view');
    Route::get('answer/{batchId}', 'AnswerController@findAnswer')->name('to_a_answer');
    Route::get('new-ans-list', 'AnswerController@getList')->name('new_answer_list');

    Route::get('selected-question', 'QuestionsController@selectedQuestions')->name('selected.answer');
    Route::get('article/{id}', 'ArticleController@show')->name('article');
    Route::get('articles', 'ArticleController@getAll')->name('all_article');

    Route::group(['middleware' => 'auth'], function () {
        //
        Route::resource('questions', 'QuestionsController');
    });

});


Route::group(['prefix' => 'api'], function () {
    Route::get('get-category', 'CategoryController@getAll');
    Route::get('new-answers', 'AnswerController@newAnswers');
    Route::get('selected-question', 'QuestionsController@getSelectedQuestion');
    Route::get('get-category-based-question/{catId}', 'CategoryController@getQuestionByCategory');
    Route::get('get-most-read', 'QuestionsController@getMostRead');
    Route::get('get-articles', 'ArticleController@getShortList');
    Route::get('get-books', 'BookController@getBooks');
    Route::get('get-search', 'QuestionsController@search');
   
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::middleware(['auth', 'role:admin|sub_admin'])->group(function () {
        Route::get('/', 'AdminController@index');
        Route::get('questions', 'QuestionController@getAll')->name("admin.questions");
        Route::get('question/{id}', 'QuestionController@find')->name('admin.question');
        Route::post('add-tag', 'QuestionController@addTag')->name("question.add.tag");
        Route::get('answered-questions', 'QuestionController@answeredQuestions')->name('admin.answered.questions');
        Route::get('all-questions', 'QuestionController@allQuestions')->name('admin.all.questions');
        Route::get('answer-question/{id}', 'QuestionController@answer')->name('admin.question.answer');
        Route::get('question-edit/{id}', 'QuestionController@edit')->name('question.edit');
        Route::post('question-edit', 'QuestionController@saveEdit')->name('admin.question.edit');
        Route::get('articles', 'ArticleController@getAll')->name('admin.articles');
        Route::get('article/{id}', 'ArticleController@find')->name('admin.article.find');
    });
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::get('change-question0-status/{id}/{status}', 'QuestionController@changeStatus')->name('question.change.status');
        Route::get('change-selection/{id}', 'QuestionController@changeSelection')->name('question.selection');
    });
});

Route::prefix('admin/api')->namespace('Admin')->group(function(){
    Route::middleware(['auth', 'role:admin|sub_admin'])->group(function(){
        Route::get('get-question/{lang}/{id}', 'QuestionController@findApi');
        Route::post('save-answer', 'AnswerController@save');
       
    });
    
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::get('change-answer-status/{status}/{id}', 'AnswerController@changeStatus');
        Route::get('article-status-change/{id}/{status}', 'ArticleController@changeStatus');
    });
});