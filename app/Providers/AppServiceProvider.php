<?php

namespace App\Providers;

use App\Answer;
use App\Observers\SubscriptionObserver;
use App\Question;
use App\User;
use App\Subscription;
use App\Observers\QuestionObserver;
use App\Observers\UserObserver;
use App\Observers\AnswerObserver;
use Illuminate\Support\Facades\View;
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
        User::observe(UserObserver::class);
        Question::observe(QuestionObserver::class);
        Answer::observe(AnswerObserver::class);
        Subscription::observe(SubscriptionObserver::class);

        View::share('mostInterestingWeeklyQuestions',
            Question::sinceDaysAgo(7)
                ->sortByDesc('rating')
                ->take(10)
        );
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
