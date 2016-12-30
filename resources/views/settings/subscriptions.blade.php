@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">

        @include('flashNotifications')

        <h1 class="mb-35">Subscriptions</h1>

        <ul class="bordered-menu">
            <li class="bordered-menu__item">
                <a href="{{ url('settings/info') }}">About myself</a>
            </li>

            <li class="bordered-menu__item">
                <a href="{{ url('settings/mailing') }}">Mailing</a>
            </li>

            <li class="bordered-menu__item bordered-menu__item--active">Subscriptions</li>
        </ul>

        <div class="panel panel-default">
            <div class="panel-heading">Question subscriptions</div>
            <div class="panel-body subscription-panel">

                @if(!$subscriptions->isEmpty())
                    @foreach($subscriptions as $subscription)

                        <div class="subscription-panel__item">

                            <a href="{{ url('question/channel') }}"
                               class="label label-default"
                               style="background-color: {{ $subscription->getQuestionsChannel()->color }};"
                            >
                                {{ $subscription->getQuestionsChannel()->slug }}
                            </a>

                            <div class="row">
                                <div class="col-md-10">
                                    <a href="{{ url('question') }}">
                                        <h3>{{ $subscription->getQuestionsTitle() }}</h3>
                                    </a>
                                </div>

                                <div class="col-md-2">
                                    @if(auth()->user() && !auth()->user()->subscribedForQuestion($subscription->subscription))
                                        <a href="javascript:;"
                                           data-href="{{ url('subscribe/question', $subscription->getQuestionsId()) }}"
                                           class="btn btn-default btn-toggleSubscription">
                                            Subscribe
                                        </a>
                                    @else
                                        <a href="javascript:;"
                                           data-href="{{ url('subscribe/question', $subscription->getQuestionsId()) }}"
                                           class="btn btn-default btn-primary btn-toggleSubscription">
                                            UnSubscribe
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else

                    <p>
                        You don't have any for a moment subscriptions.
                        You can find questions for subscription <a href="{{ url('question/new') }}">here</a>
                        or <a href="{{ url('/') }}">here</a> .
                    </p>

                @endif
            </div>
        </div>

    </div>

@endsection