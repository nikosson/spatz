<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Answer;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Channel;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
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

        flash("You've successfully asked a question!", 'success');

        return redirect()->action(
            'Frontend\QuestionController@show', ['id' => $question->id]
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

        return view('question.show', compact('question', 'answers'));
    }

    /**
     * Show the form for editing specified question
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Question $question)
    {
        $this->authorize('manage-question', $question);

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
        $this->authorize('manage-question', $question);

        $question->edit($request);

        flash("You've successfully edited your question!", 'success');

        return redirect()->action(
            'Frontend\QuestionController@show', ['id' => $question->id]
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
        $this->authorize('manage-question', $question);

        $question->delete();

        flash("You've successfully deleted your question!", 'success');

        return redirect()->action('Frontend\UserController@index');
    }

    /**
     * Show questions by specified channel
     *
     * @param Channel $channel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllByChannel(Channel $channel)
    {
        $questions = Question::withCount('answers')->where('channel_id', $channel->id)->paginate(10);

        return view('question.showAllByChannel', compact('questions', 'channel'));
    }

    /**
     * Display new questions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showNew()
    {
        $questions = Question::withCount('answers')->orderBy('created_at', 'desc')->paginate(10);
        return view('question.showNew', compact('questions'));
    }

    /**
     * Display all questions, which are not being answered
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllWithoutAnswers()
    {
        $questions = Question::withCount('answers')
            ->has('answers', '=', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('question.showAllWithoutAnswers', compact('questions'));
    }

}
