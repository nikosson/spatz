<?php

namespace App;

use App\Http\Requests\QuestionRequest;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'channel_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public static function ask(QuestionRequest $request)
    {
        return $request->user()->questions()->create($request->all());
    }

    public function edit(QuestionRequest $request)
    {
        $this->update([
            'title'      => $request->title,
            'body'       => $request->body,
            'channel_id' => $request->channel_id
        ]);

        return $this;
    }

}
