<?php

namespace App\Http\Controllers;

use App\Question;

class FeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display new questions for a user, based on his subscriptions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showNewQuestions()
    {
        $questions = Question::withCount('answers')
            ->whereIn('channel_id', auth()->user()->getChannelSubscriptions()->pluck('subscription_id'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('feed.newQuestions', compact('questions'));
    }

    /**
     * Display questions without answers for a user, based on his subscriptions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showQuestionsWithoutAnswers()
    {
        $questions = Question::withCount('answers')
            ->whereIn('channel_id', auth()->user()->getChannelSubscriptions()->pluck('subscription_id'))
            ->has('answers', '=', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('feed.questionsWithoutAnswers', compact('questions'));
    }
}
