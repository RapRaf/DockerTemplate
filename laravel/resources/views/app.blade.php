<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.webp') }}">
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    @yield('header')
</head>

<body>
    @yield('nav')
    <div class="main-body">
        @yield('content')
    </div>
    @yield('footer')
</body>

</html>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("app-bar").style.opacity = '1';
        } else {
            if (currentScrollPos > 50)
                document.getElementById("app-bar").style.opacity = "0";
        }
        prevScrollpos = currentScrollPos;
    }
    

    function getOs() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;

        if (/android/i.test(userAgent)) {
            return 0;
        }
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return 1;
        }

        return null;
    }
</script>
