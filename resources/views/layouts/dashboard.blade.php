<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} Dashboard</title>

    <!-- Styles -->
    <link href="/css/dashboard.css" rel="stylesheet">

    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('head-scripts')
</head>
<body>

    @include('backend.dashboard.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Channels</a></li>
                    <li><a href="#">Questions</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                    @include('backend.dashboard.labels')
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/tinymce/tinymce.min.js"></script>
    <script src="/js/all.js"></script>
    <script src="https://use.fontawesome.com/0b347342a5.js"></script>

    @yield('scripts')

</body>
</html>
