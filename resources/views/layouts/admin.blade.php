<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <script type="text/javascript">

        document.createElement('header');
        document.createElement('footer');

        </script>
        <link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/vendor/riot+compiler.min.js') }}"></script>
        <script src="{{ asset('riot/login.tag') }}" type="riot/tag"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <h2>{{ __('matsune.admin_subtitle') }}</h2>
                <img src="{{ asset('images/logo.gif') }}" alt="Logo GIF">
            </header>
            <div class="body_pane">
                @yield('content')
            </div>
            <footer>
                @yield('footer')
                &copy;<?= date('Y') ?>&nbsp;{{ __('matsune.company_name') }}
            </footer>
        </div>
    </body>
</html>

<script type="text/javascript" src="{{ asset('js/vendor/sweetalert2.all.min.js') }}"></script>
<script>

riot.mount('*');

</script>

