<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAnswer(Answer $answer)
    {
        $answer->mark();

        return response()->json(['approved' => $answer->approved]);

    }
}
