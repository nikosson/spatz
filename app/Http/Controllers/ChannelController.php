<?php

namespace App\Http\Controllers;

use App\Channel;

class ChannelController extends Controller
{
    /**
     * Display all channels
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $channels = Channel::paginate(12);
        return view('sidebar.allChannels', compact('channels'));
    }
}
