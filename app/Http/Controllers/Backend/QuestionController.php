<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
    public function showAll()
    {
        $questions = Question::paginate(25);
        
        return view('backend.question.showAll', compact('questions'));
    }
}
