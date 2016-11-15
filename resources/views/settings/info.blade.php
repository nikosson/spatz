@extends('layouts.app')

@section('content')

    <div class="col-md-8">

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
                <label for="exampleInputEmail1">Your name</label>
                <input type="text"
                       class="form-control"
                       id="exampleInputEmail1"
                       placeholder="Nickname"
                       name="name"
                       value="{{ $user->name }}"
                >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">About myself</label>
                <textarea class="form-control"
                          id="exampleInputEmail1"
                          placeholder="About myself"
                          rows="5">
                    {{ old('about') }}
                </textarea>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection