<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Controllers\Traits\AuthorizesUsers;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
    use AuthorizesUsers;

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Create an answer for specified question
     *
     * @param AnswerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function answer(AnswerRequest $request)
    {
        Answer::addAnswer($request);

        return back();
    }

    /**
     * Mark an answer for specified question
     *
     * @param Answer $answer
     * @return mixed
     */
    public function markAnswer(Answer $answer)
    {
        if(! $this->userCreatedQuestion($answer->question)) {
            return $this->unauthorized();
        }

        $answer->mark();

        return response()->json(['approved' => $answer->approved]);

    }
}
