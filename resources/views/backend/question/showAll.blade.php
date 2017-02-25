@extends('layouts.dashboard')

@section('sidebar')

    @include('backend.question.components.sidebar')

@endsection

@section('content')

    <h1 class="page-header">All questions</h1>

    @include('flashNotifications')

    <table class="table table-striped table-hover">
        <thead>

        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Channel</th>
            <th>Created by</th>
            <th>Subscriptions</th>
            <th>Views</th>
            <th>Rating</th>
            <th>Created at</th>
        </tr>

        </thead>
        <tbody>

        @foreach($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->title }}</td>
                <td>{{ $question->channel->title }}</td>
                <td>{{ $question->user->name }}</td>
                <td>{{ $question->subscriptions->count() }}</td>
                <td>{{ $question->views }}</td>
                <td>{{ $question->rating }}</td>
                <td>{{ $question->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $questions->links() }}

@endsection