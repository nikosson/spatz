@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">
        <div class="page-header">
            <h1>All channels</h1>
        </div>

        <div class="row">
            @foreach($channels as $channel)
                <div class="col-md-4">
                    <div class="channel-block">
                        <form  method="POST" action="subscribe/{{ $channel->slug }}">
                            {{ csrf_field() }}

                            <h3 class="channel-block__title">
                                <a href="{{ url('channel', $channel->slug) }}">{{ $channel->title }}</a>
                            </h3>

                            <hr>
                            <p class="channel-block__questionsCount">
                                {{ $channel->questions->count() }} questions
                            </p>
                            <hr>

                            <button class="btn btn-{{ auth()->user()->subscribedFor($channel) ? 'primary' : 'default' }} channel-block__subscribeButton">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $channels->links() }}
    </div>

@endsection