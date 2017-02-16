@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">

        @include('flashNotifications')

        <div class="panel panel-default">
            <div class="panel-body">

                <a href="{{ url('question/channel', $question->channel->slug) }}"
                   class="label label-default"
                   style="background-color: {{ $question->channel->color }};"
                >
                    {{ $question->channel->title }}
                </a>

                <h2>{{ $question->title }}</h2>
                {!! $question->body !!}

                <hr>

                <div>
                    <ul class="inline-list">
                        <li class="inline-list__item">Question asked {{ $question->created_at->diffForHumans() }} &#8226</li>
                        <li class="inline-list__item">{{ $question->views }} views &#8226</li>
                        <li class="inline-list__item">
                            Asked by
                            <a href="{{ route('user_info', $question->user->name) }}">
                                {{ $question->user->name }}
                            </a>

                            <a href="#">
                                <img src="/img/kappa.png_large" alt="" class="questionAvatar">
                            </a>
                        </li>
                    </ul>

                    @can('manage-question', $question)
                        <div class="btn-group pull-right" data-toggle="tooltip" data-placement="right" title="Manage question">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('question_edit', $question->id) }}">Edit</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-toggle="modal" data-target="#myModal">
                                        Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endcan
                </div>

                @if(auth()->user())

                    @if(!auth()->user()->subscribedForQuestion($question))
                        <a href="javascript:;"
                           data-href="{{ url('subscribe/question', $question->id) }}"
                           class="btn btn-toggleSubscription">
                            Subscribe
                        </a>

                    @else
                        <a href="javascript:;"
                           data-href="{{ url('subscribe/question', $question->id) }}"
                           class="btn btn-toggleSubscription btn-toggledSubscription">
                            UnSubscribe
                        </a>

                    @endif

                @endif

            </div>
        </div>

        @include('frontend.answer.partials.all')

        <hr>

        @if(auth()->check())

            @include('frontend.question.forms.answer-form')

        @else

            <div class="alert alert-warning">
                <p>
                    <a href="{{ url('login') }}">Sign in</a> in order to answer a question
                </p>
            </div>

        @endif
    </div>

    @include('frontend.question.helpers.modal-delete')

@endsection



