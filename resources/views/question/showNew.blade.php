@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">
        <div class="page-header">
            <h1>All questions</h1>
        </div>

        <ul class="bordered-menu mb-25">
            <li class="bordered-menu__item bordered-menu__item--active">
                <a href="{{ url('question/new') }}">New</a>
            </li>
            <li class="bordered-menu__item">
                <a href="{{ url('question/withoutAnswers') }}">Without answers</a>
            </li>
        </ul>

        @include('question.partials.all')

    </div>

@endsection