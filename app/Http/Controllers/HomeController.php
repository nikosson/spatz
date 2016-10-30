<?php

namespace App\Http\Controllers;

use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->paginate(10);
        return view('index', compact('questions'));
    }
}
