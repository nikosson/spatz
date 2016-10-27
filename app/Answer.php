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
}
