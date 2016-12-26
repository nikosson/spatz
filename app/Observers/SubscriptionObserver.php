<?php

namespace App\Observers;

use App\Subscription;

class SubscriptionObserver
{
    /**
     * Listen to the Subscription created event
     *
     * @param Subscription $subscription
     */
    public function created(Subscription $subscription)
    {
        //When a new answer is created,
        // the rating of the attached question will be increased by 1
        if($subscription->isQuestion())
        {
            $question = $subscription->subscription;
            $question->rating += 1;
            $question->save();
        }
    }
}