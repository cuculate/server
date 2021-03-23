<!DOCTYPE html>
<html lang="en">
<head>
    <title>Combine Shop | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/combine.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/css/slide.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/menu.css') }}">

    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="container-fluid">
    @include('frontend.base.partials.header')
</div>
<div class="container-fluid">
    <div class="main">
        <div class="banner-top">
            <a href="{{ route('home') }}"><img src="{{ asset('./images/site/logo.png') }}" alt="home"></a>
        </div>
{{--        <div class="menu m-2" >--}}
{{--            @include('frontend.base.partials.menu')--}}
{{--        </div>--}}
    <!--    main-->
        @yield('main')

        @yield('js')
        <script src="{{ asset('./js/cart.js') }}"></script>
        <br>
        @include('frontend.base.partials.footer')
        @include('frontend.base.partials.contact')
        @include('frontend.base.partials.support')
    </div>
</div>

</body>
</html>
