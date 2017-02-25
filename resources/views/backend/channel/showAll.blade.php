@extends('layouts.dashboard')

@section('sidebar')

    @include('backend.channel.components.sidebar')

@endsection

@section('content')

    <h1 class="page-header">All channels</h1>

    @include('flashNotifications')

    <table class="table table-striped table-hover">
        <thead>

        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Color</th>
            <th>Info</th>
            <th>Url</th>
            <th>Created at</th>
        </tr>

        </thead>
        <tbody>

        @foreach($channels as $channel)
            <tr>
                <td>{{ $channel->id }}</td>
                <td>{{ $channel->title }}</td>
                <td>{{ $channel->slug }}</td>
                <td>
                    <div style="background-color: {{ $channel->color }};" title="{{ $channel->color }}">
                        &nbsp
                    </div>
                </td>
                <td>{{ $channel->info }}</td>
                <td>{{ $channel->url }}</td>
                <td>{{ $channel->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>


@endsection