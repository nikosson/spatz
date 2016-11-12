<?php

namespace App;

use App\Events\QuestionWasAnswered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Answer extends Model
{
    protected $fillable = ['body', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function addAnswer(Request $request)
    {
        $answer = $request->user()->answers()->create($request->all());
        event(new QuestionWasAnswered($answer));
        return $answer;
    }

    public function approve()
    {
        $this->approved = true;
        $this->save();

        return $this;
    }

    public function unApprove()
    {
        $this->approved = false;
        $this->save();

        return $this;
    }

    public function mark()
    {
        if(!$this->approved) {
            $this->approve();
        } else {
            $this->unApprove();
        }

        return $this;
    }

    public function getQuestionerEmail()
    {
        return $this->question->user->email;
    }
}
