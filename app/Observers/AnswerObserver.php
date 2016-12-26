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
        // the rating of the attached question will be increased by 0.5
        $question = $answer->question;
        $question->rating += 0.5;
        $question->save();
    }
}