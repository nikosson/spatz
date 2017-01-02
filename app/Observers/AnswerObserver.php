<?php

namespace App\Observers;

use App\Answer;

class AnswerObserver
{
    /**
     * Listen to the Answer created event.
     *
     * @param  Answer  $answer
     * @return void
     */
    public function created(Answer $answer)
    {
        //When a new answer is created,
        // the rating of the attached question will be increased by 1
        $question = $answer->question;
        $question->rate(1);
    }
}