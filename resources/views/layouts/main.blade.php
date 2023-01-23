<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href={{ asset("assets/css/bootstrap.min.css") }} rel="stylesheet" crossorigin="anonymous">
    <link href={{ asset("assets/css/style.css") }} rel="stylesheet" crossorigin="anonymous">

    <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">

</head>
<body>


        <x-header></x-header>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
        <x-footer></x-footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>

</body>
</html>
