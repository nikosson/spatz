@extends('layouts.app-withSidebar')
@section('content')

    <div class="col-md-8">

        @include('flashNotifications')

        <div class="page-header">
            <h1>My Feed</h1>
        </div>

        @if(auth()->user()->getChannelSubscriptions()->count())
            <ul class="bordered-menu mb-25">
                <li class="bordered-menu__item bordered-menu__item--active">
                    <a href="{{ url('feed/newQuestions') }}">New</a>
                </li>
                <li class="bordered-menu__item">
                    <a href="{{ url('feed/questionsWithoutAnswers') }}">Without answers</a>
                </li>
            </ul>

            @include('question.partials.all')
        @else
            <p class="h3">
                Pick some channels, which you want to track <a href="{{ url('channel/all') }}">here</a>
            </p>
        @endif

    </div>
@endsection

