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

    public function show($id)
    {
        $question = Question::find('id', $id);
        $answers = Answer::where('question_id', $id)->orderBy('approved', 'desc')->get();
        $question->increment('views');

        $ownerExists = $this->userCreatedQuestion($id) ? true : false;

        return view('question.show', compact('question', 'ownerExists', 'answers'));
    }

    public function editForm($id)
    {
        if(! $this->userCreatedQuestion($id)) {
            return $this->unauthorized();
        }

        $question = Question::find('id', $id);
        $channelsList = Channel::all()->except($question->channel->id);

        return view('question.edit', compact('question', 'channelsList'));
    }

    public function edit(QuestionRequest $request, $id)
    {
        if(! $this->userCreatedQuestion($id)) {
            return $this->unauthorized($request);
        }

        $question = Question::find('id', $id)->edit($request);

        if ($question) {
            flash("You've successfully edited your question!", 'success');
        }

        return redirect()->action(
            'QuestionController@show', ['id' => $question->id]
        );
    }

    public function delete($id)
    {
        if(! $this->userCreatedQuestion($id)) {
            return $this->unauthorized();
        }

        $question = Question::find('id', $id);

        if($question->delete()) {
            flash("You've successfully deleted your question!", 'success');
        }

        return redirect()->action('HomeController@index');
    }



}
