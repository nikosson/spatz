<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Access\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstName', 'lastName', 'about', 'facebook_id'
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
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
     * Us
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
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
     * Update user's personal info with a given data
     *
     * @param array $data
     * @return $this
     */
    public function updatePersonalInfo(array $data)
    {
        $this->update([
            'firstName' => $data['firstName'],
            'lastName'  => $data['lastName'],
            'about'     => $data['about']
        ]);

        return $this;
    }

    /**
     * Update user's mailing info with a given data
     *
     * @param array $data
     * @return $this
     */
    public function updateMailingInfo(array $data)
    {
        $this->mailing->update([
            'answer_notifications' => isset($data['answer_notifications']),
            'news_notifications'  => isset($data['news_notifications']),
        ]);

        return $this;
    }

    /**
     * Update user's account info with a given data
     *
     * @param array $data
     * @return $this
     */
    public function updateAccountInfo(array $data)
    {
        $this->update([
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return $this;
    }

    /**
     * TODO subscribedForChannel and subscribedForQuestion are almost same methods, redesign them later ?
     * Determine if user is subscribed for specified channel
     *
     * @param Channel $channel
     * @return boolean
     */
    public function subscribedForChannel(Channel $channel)
    {
        return $channel->subscriptions->contains('user_id', $this->id);
    }

    /**
     * TODO subscribedForQuestion and subscribedForChannel are almost same methods, redesign them later ?
     * Determine if user is subscribed for specified question
     *
     * @param Question $question
     * @return boolean
     */
    public function subscribedForQuestion(Question $question)
    {
        return $question->subscriptions->contains('user_id', $this->id);
    }


    /**
     * Get channel subscriptions for user
     *
     * @return mixed
     */
    public function getChannelSubscriptions()
    {
        return $this->subscriptions()->where('subscription_type', Channel::class);
    }

    /**
     * Get question subscriptions for user
     *
     * @return mixed
     */
    public function getQuestionSubscriptions()
    {
        return $this->subscriptions()->where('subscription_type', Question::class);
    }

    /**
     * TODO: this method has no relation with User model(replace it)
     * Create a unique name, based on given name
     * Example: if 'John-Doe' already exists, it will create 'John-Doe' + count of all 'John-Doe's
     * 'John-Doe' => 'John-Doe1' => 'John-Doe2' => ...
     *
     * @param $name
     * @return mixed|string
     */
    public static function createUniqueName($name)
    {
        $noSpacesName = str_replace(' ', '-', $name);

        $userCount = User::where('name', 'like', "$noSpacesName%")->count();

        if(!$userCount) return $noSpacesName;

        return $noSpacesName . $userCount;
    }

    /**
     * Assigns user with a specified role
     *
     * @param Role $role
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }

    /**
     * Check if user has specified role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }
}
