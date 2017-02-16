@extends('layouts.app-withSidebar')

@section('content')
    <div class="col-md-8">

        <div class="jumbotron">
            <h1>{{ $channel->title }}</h1>
            <p>{{ $channel->info }}</p>
            <p>
                <a class="btn btn-primary btn-lg"
                   href="{{ $channel->url }}"
                   role="button"
                   target="_blank"
                >
                    Learn more
                </a>
            </p>
        </div>

        @include('flashNotifications')

        @include('frontend.question.partials.all')

    </div>
@endsection

