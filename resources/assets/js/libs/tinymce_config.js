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
