@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">
        <div class="page-header">
            <h1>All channels</h1>
        </div>

        @include('channel.all')

    </div>

@endsection