@extends('layouts.dashboard')

@section('content')

    <h1 class="page-header">All users</h1>

    @include('flashNotifications')

    <div class="btn-group" role="group" aria-label="...">
        <a class="btn btn-default" href="{{ url('admin/user/showAll/simple') }}">Simple view</a>
        <a class="btn btn-default" href="{{ url('admin/user/showAll/complex') }}">Complex view</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>

            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
            </tr>

        </thead>
        <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $users->links() }}

@endsection