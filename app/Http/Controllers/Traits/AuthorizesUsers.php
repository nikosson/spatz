<?php

namespace App\Http\Controllers\Traits;

use App\Question;
use Illuminate\Http\Request;

trait AuthorizesUsers
{

    protected function userCreatedQuestion(Question $question)
    {
        return Question::where([
            'id' => $question->id,
            'user_id' => \Auth::id(),
        ])->exists();
    }

    protected function unauthorized(Request $request = null)
    {
        return view('errors.403');
    }

}

