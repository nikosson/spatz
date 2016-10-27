@extends('layouts.app')

@section('styles')
    <link href="/css/prism.css" rel="stylesheet">
@endsection

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


                        @if($ownerExists)
                            <li>
                                <a href="{{ url('question/edit', $question->id) }}" class="btn btn-default">
                                    Edit
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   data-href="{{ url('question/delete', $question->id) }}"
                                   data-toggle="modal"
                                   data-target="#confirm-delete"
                                   class="btn btn-danger">
                                    Delete
                                </a>
                            </li>
                        @endif

                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Delete this question?
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to delete <b>"{{ $question->title }}"</b> question ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-danger btn-ok">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>


                </div>
            </div>

            @foreach($question->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! $answer->body !!}
                        <hr>
                        <p>
                            Answered by <a href="#">{{ $answer->user->name }} </a>
                            {{ $answer->created_at->diffForHumans() }}
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
            <p>
                <a href="{{ url('login') }}">Sign in</a> in order to answer a question
            </p>
        </div>

    @endif

        </div>
    </div>
</div>

@endsection

@section('scripts')

    <!--Modal window script-->
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>

    <script type="text/javascript" src='//cdn.tinymce.com/4/tinymce.min.js'></script>

    <script src="/js/prism.js"></script>

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

    <!--Flash message alert-->
    <script>
        $('div.alert').not('.alert-important, .alert-warning').delay(3000).fadeOut(350);
    </script>

@endsection

