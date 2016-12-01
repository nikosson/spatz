@extends('layouts.app-withSidebar')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="profile-block">
                    <img src="/img/kappa.png_large" alt="" class="profile-block__img center-block">

                    <h3 class="profile-block__heading">{{ $user->name }}</h3>

                    <p class="profile-block__brieflyName">{{ $user->firstName . " " . $user->lastName }}</p>

                    <ul class="profile-menu">
                        <li class="profile-menu__item">

                            <div class="profile-menu__contributionsCount">
                                {{ $user->questionsCount() }}
                            </div>

                            @if($user->questionsCount() > 1 || $user->questionsCount() == 0 )
                                <p class="profile-menu__paragraph">Answers</p>
                            @else
                                <p class="profile-menu__paragraph">Answer</p>
                            @endif
                        </li>

                        <li class="profile-menu__item">

                            <div class="profile-menu__contributionsCount">
                                {{ $user->answersCount() }}
                            </div>

                            @if($user->answersCount() > 1 || $user->answersCount() == 0)
                                <p class="profile-menu__paragraph">Questions</p>
                            @else
                                <p class="profile-menu__paragraph">Question</p>
                            @endif
                        </li>

                        <li class="profile-menu__item">

                            <div class="profile-menu__contributionsCount">
                                {{ $user->approvedAnswersCount() }}
                            </div>

                            @if($user->approvedAnswersCount() > 1 || $user->approvedAnswersCount() == 0)
                                <p>Approved answers</p>
                            @else
                                <p>Approved answer</p>
                            @endif
                        </li>
                    </ul>

                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>

@endsection