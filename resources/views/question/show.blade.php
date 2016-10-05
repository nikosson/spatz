@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if (session()->has('flash_notification.message'))
                    <div class="alert alert-{{ session('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {!! session('flash_notification.message') !!}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>{{ $question->title }}</h2>
                        {!! $question->body !!}

                        <ul class="bullet-list">
                            <li>Question asked {{ $question->created_at->diffForHumans() }} 	&#8226</li>
                            <li>{{ $question->views }} views</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

@endsection

