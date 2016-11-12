<?php

namespace App\Http\Controllers\Traits;

use App\Question;
use Illuminate\Http\Request;

trait AuthorizesUsers
{

    /**
     * Check if user created specified question
     *
     * @param Question $question
     * @return boolean
     */
    protected function userCreatedQuestion(Question $question)
    {
        return Question::where([
            'id' => $question->id,
            'user_id' => \Auth::id(),
        ])->exists();
    }

    /**
     * Redirect unauthorized user to 403 error page
     *
     * @param Request|null $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function unauthorized(Request $request = null)
    {
        return view('errors.403');
    }

}

