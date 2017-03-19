@extends('layouts.dashboard')

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
            <th></th>
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
                <td>
                    <div class="btn-group pull-right" data-toggle="tooltip" data-placement="right">
                        <button type="button" class="btn btn-default manage-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('admin/channel/edit', $channel->slug) }}">Edit</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="javascript:;" data-toggle="modal" data-target="#myModal">
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    @include('backend.channel.components.modal-delete')

@endsection