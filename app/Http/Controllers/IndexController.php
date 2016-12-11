<?php

namespace App\Http\Controllers;

use App\Question;

class IndexController extends Controller
{
    /** TODO Maybe it's a bad practice to do smth like this. Redesign it if needed
     * Display user's feed
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $defaultView = 'index';

        if($user) {
            $questions = Question::withCount('answers')
                ->whereIn('channel_id', $user->getChannelSubscriptions()->pluck('subscription_id'))
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
}
