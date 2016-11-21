<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;

class ProfileController extends Controller
{
    /**
     * Show general information about specified user
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showInfo(User $user)
    {
        return view('profile.info', compact('user'));
    }

    /**
     * Show all answers for specified user
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAnswers(User $user)
    {
        $answers = $user->answers;

        return view('profile.answers', compact('user', 'answers'));
    }

    /**
     * Show all questions for specified user
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showQuestions(User $user)
    {
        $questions = Question::where('user_id', $user->id)
            ->withCount('answers')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('profile.questions', compact('user', 'questions'));
    }
}
