<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;

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

    /**
     * Display all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $users = User::paginate(12);
        return view('sidebar.allUsers', compact('users'));
    }
}
