<?php

namespace App;

use App\Http\Requests\QuestionRequest;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'channel_id'];

    /**
     * Question belongs to user relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Question belongs to channel relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * Question has many answers relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    /**
     * Create a question with given request
     *
     * @param QuestionRequest $request
     * @return Question
     */
    public static function create(QuestionRequest $request)
    {
        return $request->user()->questions()->create($request->all());
    }

    /**
     * Edit a question with given request
     *
     * @param QuestionRequest $request
     * @return Question $this
     */
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
