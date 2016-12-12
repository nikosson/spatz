<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $users = User::paginate(12);
        return view('user.showAll', compact('users'));
    }
}
