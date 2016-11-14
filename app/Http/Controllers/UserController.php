<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');

    }

    public function index($name)
    {
        $user = User::getByName($name);

        return view('user.user-info', compact('user'));
    }

    public function getAnswers($name)
    {
        $user = User::getByName($name);
        $answers = $user->answers;

        return view('user.user-answers', compact('user', 'answers'));
    }

    public function getQuestions($name)
    {
        $user = User::getByName($name);

        $questions = Question::where('user_id', $user->id)
            ->withCount('answers')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.user-questions', compact('user', 'questions'));

    }


}
