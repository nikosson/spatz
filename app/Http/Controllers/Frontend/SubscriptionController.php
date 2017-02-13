<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Channel;
use App\Models\Question;
use App\Models\Subscription;
use App\Http\Controllers\Controller;


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
            'subscription_type' => 'App\Models\Channel',
            'user_id' => auth()->id()
        ])->toggleSubscription();

        return response()->json(
            ['approved' => auth()->user()->subscribedForChannel($channel)]
        );
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
            'subscription_type' => 'App\Models\Question',
            'user_id' => auth()->id()
        ])->toggleSubscription();

        return response()->json([
            'approved' => auth()->user()->subscribedForQuestion($question),
        ]);
    }
}
