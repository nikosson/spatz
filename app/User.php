<?php

namespace App;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
     * Get specified user by name
     *
     * @param $username
     * @return mixed
     */
    public static function getByName($username)
    {
        $username = str_replace('-', ' ', $username);
        $user = User::where('name', $username)->firstOrFail();

        return $user;
    }
}
