<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

//QuestionController Routes

Route::get('question/ask', 'QuestionController@askForm');
Route::post('question/ask', 'QuestionController@ask');

Route::get('question/{id}', 'QuestionController@show');

Route::get('question/edit/{id}', 'QuestionController@editForm');
Route::post('question/edit/{id}', 'QuestionController@edit');

Route::get('question/delete/{id}', 'QuestionController@delete');


//AnswerController Routes
Route::post('question/answer', 'AnswerController@answer');

Route::post('answer/mark/{id}', 'AnswerController@markAnswer');



