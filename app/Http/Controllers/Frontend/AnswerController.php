<?php

namespace App\Http\Controllers\Frontend;    

use App\Models\Answer;
use App\Http\Requests\AnswerRequest;
use App\Http\Controllers\Controller;

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
     * @return mixed
     */
    public function markAnswer(Answer $answer)
    {
        $this->authorize('manage-question', $answer->question);

        $answer->mark();

        return response()->json(['approved' => $answer->approved]);

    }
}
