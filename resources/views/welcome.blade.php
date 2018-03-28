<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ __('matsune.home_title') }}</title>
        <script type="text/javascript">

        document.createElement('header');
        document.createElement('footer');

        </script>
        <script src="{{ asset('js/vendor/riot+compiler.min.js') }}"></script>
        <script src="{{ asset('riot/login.tag') }}" type="riot/tag"></script>
        <style>

        .container {
            text-align: center;
        }

        .nav_link_pane {
            margin-top: 15px;
        }

        .nav_link_pane a {
            text-decoration: none;
            color: #303024;
            padding: 0 20px 0 0;
        }

        footer {
            color: #303024;
            margin-top: 100px;
        }

        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h2>{{ __('matsune.home_subtitle') }}</h2>
                <img src="{{ asset('images/logo.gif') }}" alt="Logo GIF">
            </header>
            @if (Route::has('login'))
                <div class="nav_link_pane">
                    @auth
                        <a href="{{ url('/profiles') }}">{{ __('matsune.profile') }}</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('matsune.logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}">{{ __('matsune.login') }}</a>
                        <a href="{{ route('register') }}">{{ __('matsune.member_register') }}</a>
                    @endauth
                </div>
            @endif
            <footer>
                &copy;<?= date('Y') ?>&nbsp;{{ __('matsune.company_name') }}
            </footer>
        </div>
    </body>
</html>

<script type="text/javascript" src="{{ asset('js/vendor/sweetalert2.all.min.js') }}"></script>
<script>

riot.mount('*');

</script>

