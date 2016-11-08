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

//Question
Route::get('question/ask', 'QuestionController@askForm');
Route::post('question/ask', 'QuestionController@ask');
Route::get('question/{question}', 'QuestionController@show');
Route::get('question/{question}/edit', 'QuestionController@edit')->name('question_edit');
Route::patch('question/{question}', 'QuestionController@update');
Route::delete('question/{question}', 'QuestionController@delete');

//Answer
Route::post('question/answer', 'AnswerController@answer');
Route::post('answer/{answer}/mark', 'AnswerController@markAnswer')->name('answer_mark');



