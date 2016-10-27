<?php

namespace App\Http\Controllers\Traits;

use App\Question;
use Illuminate\Http\Request;

trait AuthorizesUsers
{

    protected function userCreatedQuestion($id)
    {
        return Question::where([
            'id' => $id,
            'user_id' => \Auth::id(),
        ])->exists();
    }

    protected function unauthorized(Request $request = null)
    {
        return view('errors.503');
    }

}

