@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">

        @include('flashNotifications')

        <h1 class="mb-35">Settings</h1>

        <ul class="bordered-menu">
            <li class="bordered-menu__item">
                <a href="{{ url('settings/info') }}">About myself</a>
            </li>

            <li class="bordered-menu__item">
                <a href="{{ url('settings/mailing') }}">Mailing</a>
            </li>

            <li class="bordered-menu__item">
                <a href="{{ url('settings/subscriptions') }}">Subscriptions</a>
            </li>

            <li class="bordered-menu__item bordered-menu__item--active">Account</li>
        </ul>

        <form method="POST" action="{{ url('settings/account') }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            @include('errors')

            <div class="form-group">
                <label for="exampleInputEmail1">Your Email</label>
                <input type="text"
                       class="form-control"
                       placeholder="Email"
                       name="email"
                       value="{{ $user->email }}"
                >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Your New Password</label>
                <input type="password"
                       class="form-control"
                       placeholder="Your New Password"
                       name="password"
                >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Confirm New Password</label>
                <input type="password"
                       class="form-control"
                       placeholder="Confirm New Password"
                       name="password_confirmation"
                >
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection