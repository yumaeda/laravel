<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div>
            <header class="profile_header">
                <div class="profile_image_pane">
                    <img src="{{ asset('images/profiles/' . auth()->user()->id . '.gif') }}" alt="Profile Image" class="profile_image">
                </div>
                <div class="profile_name_pane">
                    <h2>{{ auth()->user()->first_name . '&nbsp;' . auth()->user()->last_name }}</h2>
                    <hr>
                    <p>
                        <span class="point_text">{{ auth()->user()->point }}</span>&nbsp;pt&nbsp;
                    </p>
                </div>
            </header>
            @yield('content')
            <footer class="profile_footer">
                <div class="copyright_pane">&copy;<?= date('Y') ?>&nbsp;Matsune Family Corporation</div>
            </footer>
        </div>
    </body>
</html>

<script type="text/javascript" src="{{ asset('js/vendor/sweetalert2.all.min.js') }}"></script>
