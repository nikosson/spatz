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

//Question
Route::get('/', 'QuestionController@index');
Route::get('channel/{channel}', 'QuestionController@showByChannel');
Route::get('question/ask', 'QuestionController@askForm');
Route::post('question/store', 'QuestionController@store');
Route::get('question/{question}', 'QuestionController@show');
Route::get('question/{question}/edit', 'QuestionController@edit')->name('question_edit');
Route::patch('question/{question}', 'QuestionController@update');
Route::delete('question/{question}', 'QuestionController@destroy');

//Answer
Route::post('question/answer', 'AnswerController@answer');
Route::post('answer/{answer}/mark', 'AnswerController@markAnswer')->name('answer_mark');

//Profile
Route::get('profile/{username}/info', 'ProfileController@index')->name('user_info');
Route::get('profile/{username}/answers', 'ProfileController@getAnswers')->name('user_answers');
Route::get('profile/{username}/questions', 'ProfileController@getQuestions')->name('user_questions');

//Settings
Route::get('settings/info', 'SettingsController@info');
Route::patch('settings/info', 'SettingsController@updateInfo');
Route::get('settings/mailing', 'SettingsController@mailing');
Route::patch('settings/mailing', 'SettingsController@updateMailing');


