@extends('layouts.profilePage')

@section('profile-content')

    <ul class="bordered-menu mb-25">
        <li class="bordered-menu__item">
            <a href="{{ route('user_info', str_replace(' ', '-', $user->name)) }}">Information</a>
        </li>
        <li class="bordered-menu__item bordered-menu__item--active">
            <a href="{{ route('user_answers', str_replace(' ', '-', $user->name)) }}">Answers</a>
        </li>
        <li class="bordered-menu__item">
            <a href="{{ route('user_questions', str_replace(' ', '-', $user->name)) }}">Questions</a>
        </li>
    </ul>

    @include('frontend.answer.partials.all')
@endsection