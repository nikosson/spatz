<div class="container">
    <div class="row ask-form-row">

        <div class="col-md-10 col-md-offset-1">
            <form method="POST" action="/question/edit/{{ $question->id }}" class="col-md-10 col-md-offset-1">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title of your question</label>
                    <input type="text"
                           class="form-control"
                           name="title"
                           value="{{ $question->title }}"
                           placeholder="Title of the question..."
                           required>

                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="body">Describe your question in details</label>
                    <textarea class="form-control"
                              name="body"
                              placeholder="Body of the question..."
                              id="myTextarea"
                              rows="10"
                              required>
                        {{ $question->body }}
                    </textarea>

                    {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="channel_id">Choose a channel or channels for your question</label>

                    <select class="selectpicker" name="channel_id">
                        <option value="{{ $question->channel->id }}" selected>{{ $question->channel->title }}</option>

                        @foreach($channelsList as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                        @endforeach
                    </select>

                    {!! $errors->first('channel_id', '<span class="help-block">:message</span>') !!}
                </div>

                <button type="submit" class="btn btn-default">Save changes</button>
            </form>
        </div>
    </div>
</div>



