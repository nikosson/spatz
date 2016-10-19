@extends('layouts.question')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-body">

                    <a class="label label-default" style="background-color: {{ $question->channel->color }};">
                        {{ $question->channel->title }}
                    </a>

                    <h2>{{ $question->title }}</h2>
                    {!! $question->body !!}

                    <hr>

                    <ul class="bullet-list">
                        <li>Question asked {{ $question->created_at->diffForHumans() }} &#8226</li>
                        <li>{{ $question->views }} views &#8226</li>
                        <li>
                            Asked by <a href="#">{{ $question->user->name }}</a>
                            <a href="#">
                                <img src="/img/kappa.png_large" alt="" class="question-avatar">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @foreach($question->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! $answer->body !!}
                        <hr>
                        <p>
                            Answered by <a href="#">{{ $answer->getUser()->name }} </a>
                            <a href="#">
                                <img src="/img/kappa.png_large" alt="" class="question-avatar">
                            </a>
                        </p>

                    </div>
                </div>
            @endforeach

                <hr>

            @if(auth()->check())

                @include('question.answer-form')

            @else

                <div class="alert alert-warning">
                    <p><a href="{{ url('login') }}">Sign in</a> in order to answer a question</p>
                </div>

            @endif

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
            'codesample advlist autoresize autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/content.css',
        toolbar: 'codesample insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>

<script>
    $('div.alert').not('.alert-important, .alert-warning').delay(3000).fadeOut(350);
</script>

@endsection

