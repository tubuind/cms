<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url', '') }}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url', '') }}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url', '') }}/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url', '') }}/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url', '') }}/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ config('app.url', '') }}/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url', '') }}/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url', '') }}/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url', '') }}/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ config('app.url', '') }}/assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="{{ config('app.url', '') }}/assets/js/core/app.js"></script>
    <script type="text/javascript" src="{{ config('app.url', '') }}/assets/js/pages/login.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container bg-slate-800">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

        <!-- main content -->
            @yield('content')
        <!-- /main content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
