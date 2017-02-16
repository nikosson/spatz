<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Channel;
use App\Http\Controllers\Controller;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all channels
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $channels = Channel::paginate(12);
        return view('frontend.channel.showAll', compact('channels'));
    }
}
