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
            <div class="point_donation_body">
                <span>To:&nbsp;</span>
                <select>
                    <option text="2">Yukitaka Maeda</option>
                    <option text="3">Dragon</option>
                    <option text="4">Shiki</option>
                </select>
                <input type="number" value="0" class="point_fld">&nbsp;pt
                <div class="comment_pane">
                    <textarea class="comment_fld" rows="5" placeholder="Write comments before donation."></textarea>
                </div>
            </div>
            <footer class="profile_footer">
                <input type="button" value="Cancel" class="footer_button" onclick="location.href='/profiles/{{ $id }}';">
                <input type="button" value="Donate" class="footer_button" onclick="alert('Not yet implemented!!');">
                <div class="copyright_pane">&copy;<?= date('Y') ?>&nbsp;Matsune Family Corporation</div>
            </footer>
        </div>
    </body>
</html>

