<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Manage Profile</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div>
            <header class="profile_header">
                <div class="profile_image_pane">
                    <img src="{{ asset('images/profiles/' . $id . '.gif') }}" alt="Profile Image" class="profile_image">
                </div>
                <div class="profile_name_pane">
                    <h2>Tetsuya Yamazaki</h2>
                    <hr>
                    <p>
                        <span class="point_text">{{ '99999999' }}</span>&nbsp;pt&nbsp;
                    </p>
                </div>
            </header>
            <div class="profile_body">
                <table>
                    <tbody>
                        <tr>
                            <td>Sex:</td>
                            <td>Men</td>
                        </tr>
                        <tr>
                            <td>Blood Type:</td>
                            <td>O</td>
                        </tr>
                        <tr>
                            <td>Birthday:</td>
                            <td>1981/3/3</td>
                        </tr>
                        <tr>
                            <td>Visited Stores:</td>
                            <td>27</td>
                        </tr>
                        <tr>
                            <td>Consumed Points:</td>
                            <td>287</td>
                        </tr>
                        <tr>
                            <td>Uploaded Photos:</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Uploaded Videos:</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <footer class="profile_footer">
                <input type="button" value="Cancel" class="footer_button" onclick="location.href='/';">
                <input type="button" value="Donate" class="footer_button" onclick="location.href='/points/{{ $id }}';">
                <div class="copyright_pane">&copy;<?= date('Y') ?>&nbsp;Matsune Family Corporation</div>
            </footer>
        </div>
    </body>
</html>

