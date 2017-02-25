<h1 class="page-header">Create new</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user/store') }}">
    {{ csrf_field() }}

    @include('errors')

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="name" class="control-label">Nickname</label>
            <input id="name"
                   type="text"
                   class="form-control"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="email" class="control-label">E-Mail Address</label>
            <input id="email"
                   type="email"
                   class="form-control"
                   name="email"
                   value="{{ old('email') }}"
                   required>

            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="password" class="control-label">Password</label>
            <input id="password"
                   type="password"
                   class="form-control"
                   name="password"
                   required>

            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm"
                   type="password"
                   class="form-control"
                   name="password_confirmation"
                   required>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </div>
</form>