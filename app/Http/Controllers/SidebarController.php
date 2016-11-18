<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Question;
use App\User;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function showAllTags()
    {
        $channels = Channel::paginate(12);
        return view('sidebar.channels', compact('channels'));
    }

    public function showAllUsers()
    {
        $users = User::paginate(12);
        return view('sidebar.users', compact('users'));
    }

    public function showAllQuestions()
    {
        $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->paginate(10);
        return view('sidebar.questions', compact('questions'));
    }
}
