<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Http\Requests\Backend\ChannelRequest;

class ChannelController extends Controller
{
    /**
     * Show all channels
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $channels = Channel::all();
        
        return view('backend.channel.showAll', compact('channels'));
    }

    /**
     * Show form for creating a new channel
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createForm()
    {
        return view('backend.channel.createNew');
    }

    /**
     * Store a new channel with requested parameters
     * 
     * @param ChannelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ChannelRequest $request)
    {
        Channel::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'color' => $request->color,
            'info' => $request->info,
            'url' => $request->url
        ]);
        flash("You've successfully created a new channel!", 'success');

        return redirect()->action(
            'Backend\ChannelController@showAll'
        );
    }
}
