@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
@endsection

@section('content')

    @include('question.forms.edit-form')

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
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
@endsection
