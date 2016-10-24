<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Channel;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');

    }

    public function askForm()
    {
        $channelsList = Channel::all();
        return view('question.ask', compact('channelsList'));
    }

    public function ask(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);


        $question = $request->user()->questions()->create($request->all());

        if ($question) {
            flash("You've successfully asked a question!", 'success');
        }

        return redirect()->action(
            'QuestionController@show', ['id' => $question->id]
        );
    }

    public function show($id)
    {
        $question = Question::where('id', $id)->first();
        $question->increment('views');

        return view('question.show', compact('question'));
    }

    public function answer(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        Answer::create($request->all());

        return back();
    }

    public function editForm($id)
    {
        $question = Question::where('id', $id)->first();
        $channelsList = Channel::all()->except($question->channel->id);

        return view('question.edit', compact('question', 'channelsList'));
    }

    public function edit(Request $request, $id)
    {
        $question = Question::where('id', $id)->first();

        $question->title = $request->title;
        $question->body = $request->body;
        $question->channel_id = $request->channel_id;

        $question->save();

        return redirect()->action(
            'QuestionController@show', ['id' => $question->id]
        );
    }

    public function delete($id)
    {
        $question = Question::where('id', $id)->first();

        $question->delete();

        return redirect()->action('HomeController@index');
    }

}
