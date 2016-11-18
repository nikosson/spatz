<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');

    }

    public function index(User $user)
    {
        return view('profile.info', compact('user'));
    }

    public function getAnswers(User $user)
    {
        $answers = $user->answers;

        return view('profile.answers', compact('user', 'answers'));
    }

    public function getQuestions(User $user)
    {
        $questions = Question::where('user_id', $user->id)
            ->withCount('answers')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('profile.questions', compact('user', 'questions'));
    }
}
