<h1 class="page-header">Create new</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/channel/store') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="title" class="control-label">Title</label>
            <input id="title"
                   type="text"
                   class="form-control"
                   name="title"
                   value="{{ old('title') }}"
                   autofocus
                   required>

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="slug" class="control-label">Slug</label>
            <input id="slug"
                   type="text"
                   class="form-control"
                   name="slug"
                   value="{{ old('slug') }}"
                   required>

            @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">

        <div class="col-md-1">
            <label for="color" class="control-label">Color</label>
            <input id="color"
                   type="color"
                   class="form-control"
                   name="color"
                   value="{{ old('color') }}"
                   required>

            @if ($errors->has('color'))
                <span class="help-block">
                    <strong>{{ $errors->first('color') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('info') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="info" class="control-label">Info</label>
            <textarea class="form-control"
                      name="info"
                      placeholder="A bit of information about the channel"
                      id="info"
                      required>{{ old('info') }}</textarea>

            @if ($errors->has('info'))
                <span class="help-block">
                    <strong>{{ $errors->first('info') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label for="url" class="control-label">Url</label>
            <input id="url"
                   type="text"
                   class="form-control"
                   name="url"
                   value="{{ old('url') }}"
                   required>

            @if ($errors->has('url'))
                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
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