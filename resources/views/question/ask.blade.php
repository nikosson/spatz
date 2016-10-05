@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
                        </textarea>

                        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
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
            width: '100%',
            height: 300,
            plugins: [
                'advlist autoresize autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'css/content.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });
    </script>
@endsection
