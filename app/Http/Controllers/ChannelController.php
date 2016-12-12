<?php

namespace App\Http\Controllers;

use App\Channel;

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
        return view('channel.showAll', compact('channels'));
    }
}
