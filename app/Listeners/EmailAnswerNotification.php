<?php

namespace App\Listeners;

use App\Events\QuestionWasAnswered;
use App\Mail\QuestionWasAnsweredMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailAnswerNotification
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
        if($event->answer->user->mailing->answer_notifications) {
            Mail::to($event->answer->getQuestionerEmail())
                ->send(new QuestionWasAnsweredMail($event->answer));
        }
    }
}
