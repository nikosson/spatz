<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Question;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');

    }

    /** TODO If user doesn't authorized, it will do a useless query to DB. Fix it
     * Display user's feed
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $questions = Question::withCount('answers')
            ->whereIn('channel_id', auth()->user()->subscriptions()->pluck('channel_id'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('index', compact('questions'));
    }

    /**
     * Toggles the subscription for specified channel
     *
     * @param Channel $channel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleSubscription(Channel $channel)
    {
        auth()->user()->toggle($channel);

        return back();
    }
}
