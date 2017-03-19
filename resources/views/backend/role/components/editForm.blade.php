<h1 class="page-header">Edit role</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/role', $role->id) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

        <div class="col-md-4">
            <label for="name" class="control-label">Name</label>
            <input id="name"
                   type="text"
                   class="form-control"
                   name="name"
                   value="{{ $role->name }}"
                   autofocus
                   required>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">

        <div class="col-md-4">
            <label for="label" class="control-label">Label</label>
            <input id="label"
                   type="text"
                   class="form-control"
                   name="label"
                   value="{{ $role->label }}"
                   required>

            @if ($errors->has('label'))
                <span class="help-block">
                    <strong>{{ $errors->first('label') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">

        <div class="col-md-4">
            <label for="permissions">Choose, which permissions you want this role to have</label>
            <select data-size="8" data-actions-box="true"    class="selectpicker" multiple id="permissions" name="permissions[]">

                <!--
                    $permissions       - all available permissions
                    $role->permissions - permissions, which role owns
                -->
                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}"
                            {{ $role->permissions->contains($permission) ? 'selected' : '' }}
                    >
                        {{ $permission->name }}
                    </option>
                @endforeach
            </select>

            @if ($errors->has('permissions'))
                <span class="help-block">
                    <strong>{{ $errors->first('permissions') }}</strong>
                </span>
            @endif
        </div>

    </div>

    <div class="form-group{{ $errors->has('usersIds') ? ' has-error' : '' }}">

        <div class="col-md-4">
            <label for="users">Choose users, which should be appointed to this role</label>
            <select data-size="8" data-actions-box="true" class="selectpicker" multiple id="users" name="usersIds[]">

                <!--
                    $users       - all users, which are registered in a resource
                    $role->users - users, which have a particular role
                -->
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                            {{ $role->users->contains($user) ? 'selected' : '' }}
                    >
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

            @if ($errors->has('permissions'))
                <span class="help-block">
                    <strong>{{ $errors->first('permissions') }}</strong>
                </span>
            @endif
        </div>

    </div>

    <div class="form-group">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </div>
</form>