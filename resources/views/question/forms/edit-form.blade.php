<div class="col-md-8 col-md-offset-2 mb-50">
    <form method="POST" action="{{ url('question/', $question->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @include('errors')

        <div class="form-group">
            <label for="title">Title of your question</label>
            <input type="text"
                   class="form-control"
                   name="title"
                   value="{{ $question->title }}"
                   placeholder="Title of the question..."
                   required>
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
        </div>

        <div class="form-group">
            <label for="channel_id">Choose a channel or channels for your question</label>

            <select class="selectpicker" name="channel_id">
                <option value="{{ $question->channel->id }}" selected>{{ $question->channel->title }}</option>

                @foreach($channelsList as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-default">Save changes</button>
    </form>
</div>



