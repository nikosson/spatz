@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">
        <div class="page-header">
            <h1>All users</h1>
        </div>

        @include('user.partials.all')

    </div>

@endsection