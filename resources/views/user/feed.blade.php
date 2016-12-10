@extends('layouts.app-withSidebar')

@section('head-scripts')

    <script type="text/javascript">
        if (window.location.hash == '#_=_'){
            history.replaceState
                    ? history.replaceState(null, null, window.location.href.split('#')[0])
                    : window.location.hash = '';
        }
    </script>

@endsection

@section('content')

    <div class="col-md-8">

        @include('flashNotifications')

        <div class="page-header">
            <h1>My Feed</h1>
        </div>

        @if(auth()->user()->getChannelSubscriptions()->count())
            @include('question.all')
        @else
            <p class="h3">
                Pick some channels, which you want to track <a href="{{ url('channel/all') }}">here</a>
            </p>
        @endif

    </div>
@endsection

