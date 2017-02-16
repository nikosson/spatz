@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">


        @include('flashNotifications')

        <h1 class="mb-35">Mailing</h1>

        <ul class="bordered-menu">
            <li class="bordered-menu__item">
                <a href="{{ url('settings/info') }}">About myself</a>
            </li>

            <li class="bordered-menu__item bordered-menu__item--active">Mailing</li>

            <li class="bordered-menu__item">
                <a href="{{ url('settings/subscriptions') }}">Subscriptions</a>
            </li>

            <li class="bordered-menu__item">
                <a href="{{ url('settings/account') }}">Account</a>
            </li>
        </ul>

        <form method="POST" action="{{ url('settings/mailing') }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="checkbox">
                <label>
                    <input type="checkbox"
                           value="1"
                           {{ $user->mailing->answer_notifications ? 'checked' : '' }}
                           name="answer_notifications">
                    Send notifications when question is answered
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"
                           value="1"
                           {{ $user->mailing->news_notifications ? 'checked' : '' }}
                           name="news_notifications">
                    Send most interesting question(every week)
                </label>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection