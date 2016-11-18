@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}" id="flash-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif

        <h1 class="mb-35">About Info</h1>

        <ul class="bordered-menu">
            <li class="bordered-menu__item bordered-menu__item--active">About myself</li>
            <li class="bordered-menu__item">
                <a href="{{ url('settings/mailing') }}">Mailing</a>
            </li>
        </ul>

        <form method="POST" action="{{ url('settings/info') }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            @include('errors')

            <div class="form-group">
                <label for="exampleInputEmail1">Your First Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="First Name"
                       name="firstName"
                       value="{{ $user->firstName }}"
                >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Your Last Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="Last Name"
                       name="lastName"
                       value="{{ $user->lastName }}"
                >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Some information about yourself</label>
                <textarea class="form-control"
                          placeholder="About myself"
                          name="about"
                          rows="5">{{ $user->about }}</textarea>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection