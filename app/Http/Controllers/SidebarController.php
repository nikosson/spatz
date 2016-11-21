<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Question;
use App\User;

class SidebarController extends Controller
{
    /**
     * Display all channels
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllChannels()
    {
        $channels = Channel::paginate(12);
        return view('sidebar.channels', compact('channels'));
    }

    /**
     * Display all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllUsers()
    {
        $users = User::paginate(12);
        return view('sidebar.users', compact('users'));
    }

    /**
     * Display all questions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllQuestions()
    {
        $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->paginate(10);
        return view('sidebar.questions', compact('questions'));
    }
}
