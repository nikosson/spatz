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
        Channel::create($request->all());
        flash("You've successfully created a new channel!", 'success');

        return redirect()->action(
            'Backend\ChannelController@showAll'
        );
    }

    /**
     * Show form for editing a channel
     *
     * @param Channel $channel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Channel $channel)
    {
        return view('backend.channel.edit', compact('channel'));
    }

    /**
     * Update a given channel with a request
     *
     * @param Channel $channel
     * @param ChannelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Channel $channel, ChannelRequest $request)
    {
        $channel->update($request->all());
        flash("You've successfully updated channel!", 'success');

        return redirect()->action(
          'Backend\ChannelController@showAll'
        );

    }

    /**
     * Delete a given channel
     *
     * @param Channel $channel
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();
        flash("You've successfully deleted channel!", 'success');
        
        return redirect()->action(
          'Backend\ChannelController@showAll'  
        );
    }
}
