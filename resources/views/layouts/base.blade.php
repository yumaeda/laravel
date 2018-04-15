<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            @inject('user_svc', 'App\Services\UserService')
            <header class="profile_header">
                <div class="profile_image_pane">
                    <img src="{{ $user_svc->getProfileImageUrl() }}" alt="Profile Image" class="profile_image">
                </div>
                <div class="profile_name_pane">
                    <h2>{{ $user_svc->getFullName() }}</h2>
                    <hr>
                    <p>
                        <span class="point_text">{{ $user_svc->getPoint() }}</span>&nbsp;pt&nbsp;
                    </p>
                </div>
            </header>
            <div class="body_pane">
            @yield('content')
            </div>
            <footer class="profile_footer">
                <div class="copyright_pane">&copy;<?= date('Y') ?>&nbsp;{{ __('matsune.company_name') }}</div>
            </footer>
        </div>
    </body>
</html>

<script type="text/javascript" src="{{ asset('js/vendor/sweetalert2.all.min.js') }}"></script>
