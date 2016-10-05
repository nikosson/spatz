@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($questions as $question)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="/question/{{ $question->id }}">
                                <h3 class="question-view-title">{{ $question->title }}</h3>
                            </a>
                            <small>
                                Asked {{ $question->updated_at->diffForHumans() }}
                                by <a href="">
                                    {{ $question->user->name }}
                                </a>
                            </small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
