<?php

namespace App;

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
        return $request->user()->answers()->create($request->all());
    }

    public static function find($rule, $id)
    {
        return Answer::where($rule, $id)->first();
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


}
