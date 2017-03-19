@extends('layouts.dashboard')

@section('content')

    <h1 class="page-header">All roles</h1>

    @include('flashNotifications')

    <table class="table table-striped table-hover">
        <thead>

            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Label</th>
                <th>Created at</th>
                <th>Permissions</th>
                <th>Users</th>
                <th></th>
            </tr>

        </thead>
        <tbody>

        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->label }}</td>
                <td>{{ $role->created_at }}</td>
                <td>
                    <ul class="inline-list">
                        @foreach($role->permissions->pluck('name') as $permission)
                            <li>{{ $permission }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="inline-list">
                        @foreach($role->users->pluck('name') as $username)
                            <li>{{ $username }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <div class="btn-group pull-right" data-toggle="tooltip" data-placement="right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('admin/role/edit', $role->id) }}">
                                    Edit
                                </a>
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

    @include('backend.role.components.modal-delete')

@endsection