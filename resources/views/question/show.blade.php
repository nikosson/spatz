@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">

        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}" id="flash-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-body">

                <a href="{{ url('channel', $question->channel->slug) }}"
                   class="label label-default"
                   style="background-color: {{ $question->channel->color }};"
                >
                    {{ $question->channel->title }}
                </a>

                <h2>{{ $question->title }}</h2>
                {!! $question->body !!}

                <hr>

                <ul class="inline-list">
                    <li class="inline-list__item">Question asked {{ $question->created_at->diffForHumans() }} &#8226</li>
                    <li class="inline-list__item">{{ $question->views }} views &#8226</li>
                    <li class="inline-list__item">
                        Asked by
                        <a href="{{ route('user_info', $question->user->name) }}">
                            {{ $question->user->name }}
                        </a>

                        <a href="#">
                            <img src="/img/kappa.png_large" alt="" class="question-avatar">
                        </a>
                    </li>
                </ul>

                @if($ownerExists)
                    <a href="{{ route('question_edit', ['id' => $question->id]) }}" class="btn btn-default">
                        Edit
                    </a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                        Delete
                    </button>
                @endif
            </div>
        </div>

        @include('question.answers')

        <hr>

        @if(auth()->check())

            @include('question.forms.answer-form')

        @else

            <div class="alert alert-warning">
                <p>
                    <a href="{{ url('login') }}">Sign in</a> in order to answer a question
                </p>
            </div>

        @endif
    </div>

@endsection

@include('question.helpers.modal-delete')


