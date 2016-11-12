<?php

namespace App\Mail;

use App\Answer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuestionWasAnsweredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $answer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.questionAnsweredLetter');
    }
}
