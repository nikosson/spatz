<?php

namespace App\Mail;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuestionWasAnsweredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $answer;
    public $user;

    /**
     * Create a new message instance.
     *
     */
    public function __construct(Answer $answer, User $user)
    {
        $this->answer = $answer;
        $this->user = $user;
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
