<?php

namespace App;

use App\Http\Requests\QuestionRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'channel_id', 'rating'];

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
     * Question has subscription polymorphic relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function subscriptions()
    {
        return $this->morphMany('App\Subscription', 'subscription');
    }

    /**
     * Create a question with given request
     *
     * @param QuestionRequest $request
     * @return Question
     */
    public static function ask(QuestionRequest $request)
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

    /**
     * Get all questions since determined quantity of days
     *
     * @param $query
     * @param $quantity
     * @return mixed
     */
    public function scopeSinceDaysAgo($query, $quantity)
    {
        return $query->where('created_at', '>=', Carbon::now()->subDay($quantity))
            ->get();
    }

    /**
     * Rate a question with a given number
     *
     * @param $number
     * @return $this
     */
    public function rate($number)
    {
        $this->rating += $number;
        $this->save();

        return $this;
    }

    /**
     * Delete attached subscriptions for a question
     * Example: it
     *
     * @return mixed
     */
    public function deleteAttachedSubscriptions()
    {
        $subscriptions = $this->subscriptions;

        if($subscriptions->isEmpty()) {
            return false;
        }

        foreach ($subscriptions as $subscription) {
            $subscription->delete();
        }

        return true;
    }
}
