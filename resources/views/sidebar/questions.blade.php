@extends('layouts.app-withSidebar')

@section('content')

    <div class="col-md-8">
        <div class="page-header">
            <h1>All questions</h1>
        </div>

        @include('question.all')

    </div>

@endsection