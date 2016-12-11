<?php

namespace App\Providers;

use App\Mailing;
use App\Question;
use App\Subscription;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user) {
            Mailing::create(['user_id' => $user->id]);
        });

        Question::created(function ($question) {
            Subscription::create([
                'subscription_type' => 'App\Question',
                'subscription_id' => $question->id,
                'user_id' => $question->user->id,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
