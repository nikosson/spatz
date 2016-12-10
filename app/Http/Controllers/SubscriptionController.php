<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Subscription;


class SubscriptionController extends Controller
{
    /**
     * Subscribe user for specified channel
     *
     * @param Channel $channel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribeForChannel(Channel $channel)
    {
        Subscription::firstOrNew([
            'subscription_id' => $channel->id,
            'subscription_type' => 'App\Channel',
            'user_id' => auth()->id()
        ])->toggleSubscription();

        return response()->json(['approved' => auth()->user()->subscribedFor($channel)]);
    }

}
