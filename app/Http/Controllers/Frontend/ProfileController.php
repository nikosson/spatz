<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Question;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show general information about specified user
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showInfo(User $user)
    {
        return view('frontend.profile.info', compact('user'));
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

        return view('frontend.profile.answers', compact('user', 'answers'));
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

        return view('frontend.profile.questions', compact('user', 'questions'));
    }
}
