<?php

Auth::routes();

//Question
Route::get('question/channel/{channel}', 'QuestionController@showByChannel');
Route::get('question/ask', 'QuestionController@askForm');
Route::post('question/store', 'QuestionController@store');
Route::get('question/all', 'QuestionController@showAll');
Route::get('question/{question}', 'QuestionController@show');
Route::get('question/{question}/edit', 'QuestionController@edit')->name('question_edit');
Route::patch('question/{question}', 'QuestionController@update');
Route::delete('question/{question}', 'QuestionController@destroy');

//Answer
Route::post('question/answer', 'AnswerController@answer');
Route::post('answer/{answer}/mark', 'AnswerController@markAnswer')->name('answer_mark');

//Channel
Route::get('channel/all', 'ChannelController@showAll');

//Profile
Route::get('profile/{user}/info', 'ProfileController@showInfo')->name('user_info');
Route::get('profile/{user}/answers', 'ProfileController@showAnswers')->name('user_answers');
Route::get('profile/{user}/questions', 'ProfileController@showQuestions')->name('user_questions');

//Settings
Route::get('settings/info', 'SettingsController@showInfo');
Route::patch('settings/info', 'SettingsController@updateInfo');
Route::get('settings/mailing', 'SettingsController@showMailing');
Route::patch('settings/mailing', 'SettingsController@updateMailing');

//User
Route::get('/', 'UserController@index');
Route::get('user/all', 'UserController@showAll');

//Oauth2
Route::get('auth/facebook', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\SocialAuthController@handleProviderCallback');

//Subscriptions
Route::post('subscribe/channel/{channel}', 'SubscriptionController@subscribeForChannel');
Route::post('subscribe/question/{channel}', 'SubscriptionController@subscribeForQuestion');
