<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Channel;
use App\Http\Controllers\Traits\AuthorizesUsers;

class QuestionController extends Controller
{

    use AuthorizesUsers;

    public function __construct()
    {
        $this->middleware('auth')->except('show');

    }

    public function askForm()
    {
        $channelsList = Channel::all();

        return view('question.ask', compact('channelsList'));
    }

    public function ask(QuestionRequest $request)
    {
        $question = Question::ask($request);

        if ($question) {
            flash("You've successfully asked a question!", 'success');
        }

        return redirect()->action(
            'QuestionController@show', ['id' => $question->id]
        );
    }

    public function show(Question $question)
    {
        $answers = Answer::where('question_id', $question->id)->orderBy('approved', 'desc')->get();
        $question->increment('views');

        $ownerExists = $this->userCreatedQuestion($question) ? true : false;

        return view('question.show', compact('question', 'ownerExists', 'answers'));
    }

    public function edit(Question $question)
    {
        if(! $this->userCreatedQuestion($question)) {
            return $this->unauthorized();
        }

        $channelsList = Channel::all()->except($question->channel->id);

        return view('question.edit', compact('question', 'channelsList'));
    }

    public function update(Question $question, QuestionRequest $request)
    {
        if(! $this->userCreatedQuestion($question)) {
            return $this->unauthorized($request);
        }

        $question->edit($request);

        if ($question) {
            flash("You've successfully edited your question!", 'success');
        }

        return redirect()->action(
            'QuestionController@show', ['id' => $question->id]
        );
    }

    public function delete(Question $question)
    {
        if(! $this->userCreatedQuestion($question)) {
            return $this->unauthorized();
        }

        if($question->delete()) {
            flash("You've successfully deleted your question!", 'success');
        }

        return redirect()->action('HomeController@index');
    }



}
