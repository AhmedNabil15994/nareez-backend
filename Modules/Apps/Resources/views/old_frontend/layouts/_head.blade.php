<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '--') || {{ setting('app_name',locale()) }} </title>
    <meta name="description" content="">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/lightcase.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/linearicons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/calender.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/intlTelInput.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/style-'.locale().'.css') }}"/>
    <link rel="icon"       href="{{ asset(setting('logo')) }}"/>
    @stack('styles_plugins')


    @stack('styles')
</head>
