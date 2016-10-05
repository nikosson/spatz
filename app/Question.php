<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public static function from(User $user)
    {
        $question = new static;

        $question->user_id = $user->id;

        return $question;
    }

    public function fullFill($attributes)
    {
        return $this->fill($attributes)->save;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
