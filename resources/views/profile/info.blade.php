@extends('layouts.profile-page')

@section('profile-content')

    <ul class="bordered-menu mb-25">
        <li class="bordered-menu__item bordered-menu__item--active">
            <a href="{{ route('user_info', $user->name) }}">Information</a>
        </li>
        <li class="bordered-menu__item">
            <a href="{{ route('user_answers', $user->name) }}">Answers</a>
        </li>
        <li class="bordered-menu__item">
            <a href="{{ route('user_questions', $user->name) }}">Questions</a>
        </li>
    </ul>

    <p>{{ $user->about }}</p>

@endsection