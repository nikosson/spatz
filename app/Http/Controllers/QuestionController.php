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
        $this->middleware('auth')->except('show', 'index');

    }

    /**
     * Display all questions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->paginate(10);
        return view('index', compact('questions'));
    }

    /**
     * Show the form for asking a question
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function askForm()
    {
        $channelsList = Channel::all();

        return view('question.ask', compact('channelsList'));
    }

    /**
     * Store a newly created question in a storage
     *
     * @param QuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuestionRequest $request)
    {
        $question = Question::ask($request);

        if ($question) {
            flash("You've successfully asked a question!", 'success');
        }

        return redirect()->action(
            'QuestionController@show', ['id' => $question->id]
        );
    }

    /**
     * Show a specified question
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Question $question)
    {
        $answers = Answer::where('question_id', $question->id)
            ->orderBy('approved', 'desc')
            ->get();

        $question->increment('views');

        $ownerExists = $this->userCreatedQuestion($question);

        return view('question.show', compact('question', 'ownerExists', 'answers'));
    }

    /**
     * Show the form for editing specified question
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Question $question)
    {
        if(! $this->userCreatedQuestion($question)) {
            return $this->unauthorized();
        }

        $channelsList = Channel::all()->except($question->channel->id);

        return view('question.edit', compact('question', 'channelsList'));
    }

    /**
     * Update specified question in a storage
     *
     * @param Question $question
     * @param QuestionRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
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

    /**
     * Remove the specified question from a storage
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function destroy(Question $question)
    {
        if(! $this->userCreatedQuestion($question)) {
            return $this->unauthorized();
        }

        if($question->delete()) {
            flash("You've successfully deleted your question!", 'success');
        }

        return redirect()->action('QuestionController@index');
    }

    /**
     * Show questions by specified channel
     *
     * @param Channel $channel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showByChannel(Channel $channel)
    {
        $questions = Question::withCount('answers')->where('channel_id', $channel->id)->paginate(10);

        return view('question.allByChannel', compact('questions', 'channel'));
    }

}
