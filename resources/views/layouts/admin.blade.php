<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('assets/img/barista-beans.png')}}">


    @vite(['resources/sass/admin.scss'])
</head>
<body>
@include('admin.partials.nav')
<main class="admin-main">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning">
            {{session('warning')}}
        </div>
    @endif

    @yield('content')
</main>

@vite(['resources/js/app.js'])
</body>
</html>
