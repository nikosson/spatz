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

                    <ul class="inline-list">
                        <li>Question asked {{ $question->created_at->diffForHumans() }} &#8226</li>
                        <li>{{ $question->views }} views &#8226</li>
                        <li>
                            Asked by <a href="#">{{ $question->user->name }}</a>
                            <a href="#">
                                <img src="/img/kappa.png_large" alt="" class="question-avatar">
                            </a>
                        </li>
                    </ul>

                    @if($ownerExists)
                        <a href="{{ route('question_edit', ['id' => $question->id]) }}" class="btn btn-default mr-5">
                            Edit
                        </a>

                        <!--
                        <a href="#"
                           data-href="{{ url('question/delete', $question->id) }}"
                           data-toggle="modal"
                           data-target="#confirm-delete"
                           class="btn btn-danger">
                            Delete
                        </a>
                        -->

                        <form action="{{ url('question', $question->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>

            @include('question.answers')

            <hr>

            @if(auth()->check())

                @include('question.forms.answer-form')

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

@include("question.helpers.modal-delete")

@endsection

@section('scripts')


    <script>
        function sendAjax(e) {
            e.preventDefault();
            var self = $(this);

            $.ajax({
                url: self.attr('href'),
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data.approved) {
                        self.text('Approved');
                    } else {
                        self.text('Mark as answer');
                    }
                    self.toggleClass('btn-answer-approved');

                }
            });
        }
        $('.btn-primary').on('click', sendAjax)
    </script>

    <!--Modal window script-->
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>

    <script src="https://use.fontawesome.com/0b347342a5.js"></script>

    <!--<script type="text/javascript" src='//cdn.tinymce.com/4/tinymce.min.js'></script>-->

    <script src="/js/tinymce/tinymce.min.js"></script>
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
        $('div.alert').not('.alert-important, .alert-warning, .alert-danger').delay(3000).fadeOut(350);
    </script>

@endsection

