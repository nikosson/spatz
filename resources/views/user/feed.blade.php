@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">

        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}" id="flash-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif

        <div class="page-header">
            <h1>My Feed</h1>
        </div>

        @if(auth()->user()->subscriptions->count())
            @include('question.all')
        @else
            <p class="h3">
                Pick some channels, which you want to track <a href="{{ url('channels') }}">here</a>
            </p>
        @endif

    </div>
@endsection

