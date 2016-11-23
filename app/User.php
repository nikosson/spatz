<?php

namespace App;

use App\Http\Requests\SettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstName', 'lastName', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Route for the model
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * User has many questions relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * User has many answers relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * User belongs to many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Channel::class, 'channels_subscriptions');
    }

    /**
     * User has one mailing relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mailing()
    {
        return $this->hasOne(Mailing::class);
    }

    /**
     * Check if user created question
     *
     * @param Question $question
     * @return bool
     */
    public function createdQuestion(Question $question)
    {
        return $this->id == $question->user_id;
    }

    /**
     * Count the number of questions, asked by a specified user
     *
     * @return int
     */
    public function answersCount()
    {
        return $this->questions->count();
    }

    /**
     * Count the number of answers, answered by a specified user
     *
     * @return mixed
     */
    public function questionsCount()
    {
        return $this->answers->count();
    }

    /**
     * Count the number of approved answers, answered by a specified user
     *
     * @return mixed
     */
    public function approvedAnswersCount()
    {
        return Answer::where('user_id', $this->id)->where('approved', true)->count();
    }

    /**
     * Update info about the user in settings with a given request
     *
     * @param SettingsRequest $request
     * @return $this
     */
    public function updateSettingsInfo(SettingsRequest $request)
    {
        $this->update([
            'firstName' => $request->firstName,
            'lastName'  => $request->lastName,
            'about'     => $request->about
        ]);

        return $this;
    }

    /**
     * Update mailing info about the user in settings with a given request
     *
     * @param Request $request
     * @return $this
     */
    public function updateSettingsMailing(Request $request)
    {
        $this->mailing->update([
            'answer_notifications' => isset($request->answer_notifications),
            'news_notifications'  => isset($request->news_notifications),
        ]);

        return $this;
    }

    /**
     * Determine if user is subscribed for specified channel
     *
     * @param Channel $channel
     * @return boolean
     */
    public function subscribedFor(Channel $channel)
    {
        return $channel->subscriptions->contains('user_id', $this->id);
    }

    /**
     * Toggle the subscription with a given channel for current user
     *
     * @param Channel $channel
     * @return $this
     */
    public function toggle(Channel $channel)
    {
        if(!$this->subscribedFor($channel)) {
            $this->subscriptions()->attach($channel);
        } else {
            $this->subscriptions()->detach($channel);
        }

        return $this;
    }
}
