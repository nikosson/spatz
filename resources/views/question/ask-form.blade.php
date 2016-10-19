<div class="container">
    <div class="row ask-form-row">

        <div class="col-md-10 col-md-offset-1">
            <form method="POST" action="/question/ask" class="col-md-10 col-md-offset-1">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title of your question</label>
                    <input type="text"
                           class="form-control"
                           name="title"
                           value="{{ old('title') }}"
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
                        {{ old('body') }}
                    </textarea>

                    {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="channel_id">Choose a channel or channels for your question</label>

                    <select class="selectpicker" name="channel_id">
                        <option selected disabled>Pick a channel...</option>

                        @foreach($channelsList as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                        @endforeach
                    </select>

                    {!! $errors->first('channel_id', '<span class="help-block">:message</span>') !!}
                </div>

                <button type="submit" class="btn btn-default">Ask a question</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#myTextarea',
        theme: 'modern',
        menubar: 'false',
        width: '100%',
        height: 300,
        plugins: [
            'codesample advlist autoresize autolink link image lists charmap preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/content.css',
        toolbar: 'codesample insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons'
    });
</script>


