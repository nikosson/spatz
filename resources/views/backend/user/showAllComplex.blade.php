@extends('layouts.dashboard')

@section('content')

    <h1 class="page-header">All users</h1>

    <div class="btn-group" role="group" aria-label="...">
        <a class="btn btn-default" href="{{ url('admin/user/showAll/simple') }}">Simple view</a>
        <a class="btn btn-default" href="{{ url('admin/user/showAll/complex') }}">Complex view</a>
    </div>

    <table class="table table-striped table-hover schedule-table">
        <thead>

        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Questions</th>
            <th>Answers</th>
            <th>Question Subscriptions</th>
            <th>Channel Subscriptions</th>
            <th>Created at</th>
        </tr>

        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->firstName }}</td>
                <td>{{ $user->lastName }}</td>
                <td>{{ $user->questions->count() }}</td>
                <td>{{ $user->answers->count() }}</td>
                <td>{{ $user->getQuestionSubscriptions()->count() }}</td>
                <td>{{ $user->getChannelSubscriptions()->count() }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $users->links() }}

@endsection