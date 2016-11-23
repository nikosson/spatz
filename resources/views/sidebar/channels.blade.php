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

                        <h3 class="channel-block__title">
                            <a href="{{ url('channel', $channel->slug) }}">{{ $channel->title }}</a>
                        </h3>

                        <hr>
                        <p class="channel-block__questionsCount">
                            {{ $channel->questions->count() }} questions
                        </p>
                        <hr>

                        @if(!auth()->user()->subscribedFor($channel))
                            <a href="javascript:;"
                               data-href="{{ url('subscribe', $channel->slug) }}"
                               class="btn btn-default btn-toggleSubscription">
                                Subscribe
                            </a>
                        @else
                            <a href="javascript:;"
                               data-href="{{ url('subscribe', $channel->slug) }}"
                               class="btn btn-default btn-primary btn-toggleSubscription">
                                UnSubscribe
                            </a>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>

        {{ $channels->links() }}
    </div>

@endsection