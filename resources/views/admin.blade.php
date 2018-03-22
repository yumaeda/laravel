<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>松根ファミリー｜Administration</title>
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
                <h2>山ちゃんと愉快な管理者達！！</h2>
                <img src="{{ asset('images/logo.gif') }}" alt="Logo GIF">
            </header>
            @if (Route::has('login'))
                <div class="nav_link_pane">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endif
            <footer>
                &copy;<?= date('Y') ?>&nbsp;松根ファミリー
            </footer>
        </div>
    </body>
</html>

<script type="text/javascript" src="{{ asset('js/vendor/sweetalert2.all.min.js') }}"></script>
<script>

riot.mount('*');

</script>

