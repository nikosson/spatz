<?php

namespace App\Listeners;

use App\Events\QuestionWasAnswered;
use App\Mail\QuestionWasAnsweredMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailAddedNewAnswerNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  QuestionWasAnswered  $event
     * @return void
     */
    public function handle(QuestionWasAnswered $event)
    {
        $question = $event->answer->question;
        $answer = $event->answer;

        foreach($question->subscriptions as $subscription) {
            Mail::to($subscription->getSubscribersEmail())
                ->send(new QuestionWasAnsweredMail($answer, $subscription->getSubscriber()));
        }
    }
}
