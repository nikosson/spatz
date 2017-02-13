<?php

namespace App\Observers;

use App\Models\Question;
use App\Models\Subscription;

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
        //When user asks question, it will be automatically subscribed for it
        Subscription::create([
            'subscription_type' => 'App\Models\Question',
            'subscription_id' => $question->id,
            'user_id' => $question->user->id,
        ]);
    }

    /**
     * Listen to the Question deleted event
     *
     * @param Question $question
     */
    public function deleted(Question $question)
    {
        //We can't use foreign key constrains in this case, because there is polymorphic relationship
        //between 'questions' and 'subscriptions' table
        $question->deleteAttachedSubscriptions();
    }
}