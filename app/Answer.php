<?php

namespace App;

use App\Events\QuestionWasAnswered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Answer extends Model
{
    protected $fillable = ['body', 'question_id'];

    /**
     * Answer belongs to question relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Answer belongs to user relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Add answer with given request
     *
     * @param Request $request
     * @return Answer $answer
     */
    public static function addAnswer(Request $request)
    {
        $answer = $request->user()->answers()->create($request->all());
        event(new QuestionWasAnswered($answer));
        return $answer;
    }

    /**
     * Approve given answer
     *
     * @return Answer $this
     */
    public function approve()
    {
        $this->approved = true;
        $this->save();

        return $this;
    }

    /**
     * Unapprove given answer
     *
     * @return Answer $this
     */
    public function unApprove()
    {
        $this->approved = false;
        $this->save();

        return $this;
    }

    /**
     * Mark given answer
     *
     * @return Answer $this
     */
    public function mark()
    {
        if(!$this->approved) {
            $this->approve();
        } else {
            $this->unApprove();
        }

        return $this;
    }

    /**
     * Get the email address from the creator of the answered question
     *
     * @return string
     */
    public function getQuestionerEmail()
    {
        return $this->question->user->email;
    }
}
