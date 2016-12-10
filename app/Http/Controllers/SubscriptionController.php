<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Question;
use App\Subscription;


class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Subscribe user for specified channel
     *
     * @param Channel $channel
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribeForChannel(Channel $channel)
    {
        Subscription::firstOrNew([
            'subscription_id' => $channel->id,
            'subscription_type' => 'App\Channel',
            'user_id' => auth()->id()
        ])->toggleSubscription();

        return response()->json(['approved' => auth()->user()->subscribedForChannel($channel)]);
    }


    /**
     * Subscribe user for specified question
     *
     * @param Question $question
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribeForQuestion(Question $question)
    {
        Subscription::firstOrNew([
            'subscription_id' => $question->id,
            'subscription_type' => 'App\Question',
            'user_id' => auth()->id()
        ])->toggleSubscription();

        return response()->json([
            'approved' => auth()->user()->subscribedForQuestion($question),
        ]);
    }



}
