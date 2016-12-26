<?php

namespace App\Observers;

use App\Question;
use App\Subscription;

class QuestionObserver
{
    /**
     * Listen to the Question created event.
     *
     * @param  Question  $question
     * @return void
     */
    public function created(Question $question)
    {
        Subscription::create([
            'subscription_type' => 'App\Question',
            'subscription_id' => $question->id,
            'user_id' => $question->user->id,
        ]);
    }
}