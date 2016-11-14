@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}" id="flash-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif

        @foreach($questions as $question)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <div class="row">
                            <div class="col-md-10">

                                <a href="{{ url('channel', $question->channel->slug) }}"
                                   class="label label-default"
                                   style="background-color:{{ $question->channel->color }}"
                                >
                                    {{ $question->channel->title }}
                                </a>

                                <a href="{{ url('question', $question->id) }}">
                                    <h3 class="question-view-title">{{ $question->title }}</h3>
                                </a>

                                <small>
                                    Asked {{ $question->created_at->diffForHumans() }}
                                    by <a href="{{ route('user_info', str_replace(' ', '-', $question->user->name)) }}">
                                        {{ $question->user->name }}
                                    </a>
                                </small>
                            </div>

                            <div class="col-md-2 answer-block mt-25">
                                <span>{{ $question->answers_count }} answers</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

        {{ $questions->links() }}
    </div>
@endsection

