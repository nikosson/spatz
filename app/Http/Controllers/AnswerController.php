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

    public function answer(AnswerRequest $request)
    {
        Answer::addAnswer($request);

        return back();
    }

    public function markAnswer($id)
    {
        $answer = Answer::find('id', $id)->mark();

        return response()->json(['approved' => $answer->approved]);

    }
}
