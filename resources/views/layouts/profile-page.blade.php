@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="profile-block">
                    <img src="/img/kappa.png_large" alt="" class="profile-block_img center-block">

                    <h3 class="profile-block_heading">{{ $user->name }}</h3>

                    <p class="profile-block_briefly-name">{{ $user->firstName . " " . $user->lastName }}</p>

                    <ul class="profile-menu mb-25">
                        <li>

                            <div class="profile-menu_questions-count">
                                {{ $user->questionsCount() }}
                            </div>

                            @if($user->questionsCount() > 1 || $user->questionsCount() == 0 )
                                <p>Answers</p>
                            @else
                                <p>Answer</p>
                            @endif
                        </li>

                        <li>

                            <div class="profile-menu_questions-count">
                                {{ $user->answersCount() }}
                            </div>

                            @if($user->answersCount() > 1 || $user->answersCount() == 0)
                                <p>Questions</p>
                            @else
                                <p>Question</p>
                            @endif
                        </li>

                        <li>

                            <div class="profile-menu_questions-count">
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