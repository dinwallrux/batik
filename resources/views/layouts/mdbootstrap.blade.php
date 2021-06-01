<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yanto Batik</title>

    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('mdbootstrap/ecommerce/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mdbootstrap/ecommerce/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mdbootstrap/ecommerce/compiled-addons-4.19.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mdbootstrap/ecommerce/mdb-plugins-gathered.min.css') }}">
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('mdbootstrap/mdb-compiled-ecommerce-4.18.0.min.css') }}">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="skin-light">
    @yield('content')

    <!-- MDB -->
    {{-- <script type="text/javascript" src="{{ asset('mdbootstrap/mdb.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/mdb-pro.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/mdb-plugins-gathered.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/compiled-addons.min.js') }}"></script>
</body>
</html>
