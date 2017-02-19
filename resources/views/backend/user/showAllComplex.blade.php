@extends('layouts.dashboard')

@section('sidebar')

    <ul class="nav nav-sidebar">
        <li>
            <a href="{{ url('admin/') }}">Overview</a>
        </li>

        <li class="active">
            <a href="javascript:;" data-toggle="collapse" data-target="#toggleButtons-users">
                Users
                <i class="fa fa-chevron-down" aria-hidden="true"></i>

            </a>

            <ul class="nav nav-subbar collapse" id="toggleButtons-users">
                <li><a href="#">Show all</a></li>
                <li><a href="#">Create new</a></li>
                <li><a href="#">Ban list</a></li>
            </ul>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#toggleButtons-channels">
                Channels
                <i class="fa fa-chevron-down" aria-hidden="true"></i>

            </a>

            <ul class="nav nav-subbar collapse" id="toggleButtons-channels">
                <li><a href="#">Show all</a></li>
                <li><a href="#">Create new</a></li>
            </ul>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#toggleButtons-questions">
                Questions
                <i class="fa fa-chevron-down" aria-hidden="true"></i>

            </a>

            <ul class="nav nav-subbar collapse" id="toggleButtons-questions">
                <li><a href="#">Show all</a></li>
            </ul>
        </li>

    </ul>

@endsection

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