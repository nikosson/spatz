@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">

        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}" id="flash-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif

        <h1 class="mb-35">Mailing</h1>

        <ul class="bordered-menu">
            <li class="bordered-menu__item">
                <a href="{{ url('settings/info') }}">About myself</a>
            </li>
            <li class="bordered-menu__item bordered-menu__item--active">Mailing</li>
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