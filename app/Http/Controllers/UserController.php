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

    /** TODO Maybe it's a bad practice to do smth like this. Redesign it if needed
     * Display user's feed
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $defaultView = 'index';

        if(auth()->user()) {
            $questions = Question::withCount('answers')
                ->whereIn('channel_id', auth()->user()->subscriptions()->pluck('channel_id'))
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            $defaultView = 'user.feed';
        } else {
            $questions = Question::withCount('answers')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view($defaultView, compact('questions'));
    }

    /**
     * Toggles the subscription for specified channel
     *
     * @param Channel $channel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleSubscription(Channel $channel)
    {
        $user = auth()->user();
        $user->toggle($channel);

        return response()->json(['approved' => $user->subscribedFor($channel)]);
    }
}
