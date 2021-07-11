<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Alfatawa-Alhanafia</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Font Awesome Icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <style type="text/css">
        .nav-link {
            color: #222222;
        }

        .sub-div {
            border: 1px solid #ED174B;
            padding: 9px;
            margin: 5px;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;

        }

        body {
            font-family: 'Poppins', sans-serif;
        }

    </style>


    @yield('css')
</head>

<body>
    <div id="app">
        @include('frontend.layouts.topbar')
        @include('frontend.layouts.navbar')
        @yield('content')
        @include('frontend.layouts.footer')
    </div>


    <script src="{{ asset('js/app.js?v=1.2') }}"></script>

    <script>
        function openSearch() {
            document.getElementById("myOverlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>

    <script>
        //sticky navbar
        $(window).scroll(function() {
            let position = $(this).scrollTop();
            if (position >= 250) {
                $('#MyNavbar').addClass('fixed-top');
            } else {
                $('#MyNavbar').removeClass('fixed-top');
            }
        })
    </script>

    <script type="text/javascript">
        function logout() {
            document.getElementById('logout-form').submit();
        }
    </script>
    @yield('js')
</body>

</html>
