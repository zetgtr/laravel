
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href={{ asset("assets/css/bootstrap.min.css") }} rel="stylesheet" crossorigin="anonymous">

    <!-- Favicons -->
{{--    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">--}}
{{--    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">--}}
{{--    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">--}}
{{--    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">--}}
{{--    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">--}}
{{--    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">--}}
    <meta name="theme-color" content="#712cf9">


{{--    <style>--}}
{{--        .bd-placeholder-img {--}}
{{--            font-size: 1.125rem;--}}
{{--            text-anchor: middle;--}}
{{--            -webkit-user-select: none;--}}
{{--            -moz-user-select: none;--}}
{{--            user-select: none;--}}
{{--        }--}}

{{--        @media (min-width: 768px) {--}}
{{--            .bd-placeholder-img-lg {--}}
{{--                font-size: 3.5rem;--}}
{{--            }--}}
{{--        }--}}

{{--        .b-example-divider {--}}
{{--            height: 3rem;--}}
{{--            background-color: rgba(0, 0, 0, .1);--}}
{{--            border: solid rgba(0, 0, 0, .15);--}}
{{--            border-width: 1px 0;--}}
{{--            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);--}}
{{--        }--}}

{{--        .b-example-vr {--}}
{{--            flex-shrink: 0;--}}
{{--            width: 1.5rem;--}}
{{--            height: 100vh;--}}
{{--        }--}}

{{--        .bi {--}}
{{--            vertical-align: -.125em;--}}
{{--            fill: currentColor;--}}
{{--        }--}}

{{--        .nav-scroller {--}}
{{--            position: relative;--}}
{{--            z-index: 2;--}}
{{--            height: 2.75rem;--}}
{{--            overflow-y: hidden;--}}
{{--        }--}}

{{--        .nav-scroller .nav {--}}
{{--            display: flex;--}}
{{--            flex-wrap: nowrap;--}}
{{--            padding-bottom: 1rem;--}}
{{--            margin-top: -1px;--}}
{{--            overflow-x: auto;--}}
{{--            text-align: center;--}}
{{--            white-space: nowrap;--}}
{{--            -webkit-overflow-scrolling: touch;--}}
{{--        }--}}
{{--    </style>--}}


</head>
<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <strong>Нвости</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Наверх</a>
        </p>
        <p class="mb-1">Новостной портал</p>
    </div>
</footer>


<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>


</body>
</html>
