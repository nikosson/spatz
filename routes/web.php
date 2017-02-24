<?php

Auth::routes();

//Oauth2
Route::get('auth/facebook', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\SocialAuthController@handleProviderCallback');

//Frontend routes(routes for a simple user)
Route::group(['namespace' => 'Frontend'], function () {
    
    //Index
    Route::get('/', 'IndexController@index');

    //Question
    Route::get('question/channel/{channel}', 'QuestionController@showAllByChannel');
    Route::get('question/withoutAnswers', 'QuestionController@showAllWithoutAnswers');
    Route::get('question/ask', 'QuestionController@askForm');
    Route::post('question/store', 'QuestionController@store');
    Route::get('question/new', 'QuestionController@showNew');
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
    Route::get('settings/subscriptions', 'SettingsController@showSubscriptions');
    Route::get('settings/account', 'SettingsController@showAccountInfo');
    Route::patch('settings/account', 'SettingsController@updateAccountInfo');


    //User
    Route::get('user/all', 'UserController@showAll');

    //Subscriptions
    Route::post('subscribe/channel/{channel}', 'SubscriptionController@subscribeForChannel');
    Route::post('subscribe/question/{question}', 'SubscriptionController@subscribeForQuestion');

    //Feed
    Route::get('feed/questionsWithoutAnswers', 'FeedController@showQuestionsWithoutAnswers');
    Route::get('feed/newQuestions', 'FeedController@showNewQuestions');
});


//Backend routes(routes for a staff users)
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => ['auth', 'checkRole:admin']], function () {

    //Dashboard
    Route::get('/', 'DashboardController@index');
    
    //Actions with user
    Route::get('user/showAll/{showType?}', 'UserController@showAll');
    Route::get('user/create', 'UserController@createForm');
    Route::post('user/store', 'UserController@store');
    
    
});
