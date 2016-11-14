<div class="container">
    <div class="row mb-150">

        <div class="col-md-10 col-md-offset-1">
            <form method="POST" action="/question/store" class="col-md-10 col-md-offset-1">
                {{ csrf_field() }}

                @include('errors')

                <div class="form-group">
                    <label for="title">Title of your question</label>
                    <input type="text"
                           class="form-control"
                           name="title"
                           value="{{ old('title') }}"
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
                        {{ old('body') }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="channel_id">Choose a channel or channels for your question</label>

                    <select class="selectpicker" name="channel_id">
                        <option selected disabled>Pick a channel...</option>

                        @foreach($channelsList as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                        @endforeach
                    </select>

                </div>

                <button type="submit" class="btn btn-default">Ask a question</button>
            </form>
        </div>
    </div>
</div>



