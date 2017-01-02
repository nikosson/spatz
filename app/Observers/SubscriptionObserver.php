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
        //When user subscribed to a question
        // the rating of the attached question will be increased by 2
        if($subscription->isQuestion()) {
            $question = $subscription->subscription;
            $question->rate(2);
        }
    }

    /**
     * Listen to the Subscription deleted event
     *
     * @param Subscription $subscription
     */
    public function deleted(Subscription $subscription)
    {
        //When user unsubscribed from a question
        // the rating of the attached question will be decreased by 2
        if($subscription->isQuestion()) {
            $question = $subscription->subscription;
            $question->rate(-2);
        }
    }
}