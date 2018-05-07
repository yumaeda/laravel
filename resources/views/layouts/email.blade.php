<h3>@yield('title')</h3>
<div style="margin-top: 20px; width: 100%">
    <img style="padding: 15px; width: 100%;" src="https://s3-ap-northeast-1.amazonaws.com/matsune-bank-s3/images/email/{{ mt_rand(1, 16) }}.png" alt="Main Image">
</div>
<div>
    @yield('content')
</div>
<div style="margin-top: 20px;">
    <div>
        Please refer to the <a href="http://{{ request()->getHttpHost() }}/profiles/">{{__('matsune.profile') }}</a> for checking your points.
    </div>
    <div style="margin-top: 20px;">
        Thank you for supporting Matsune Bank.<br>
        We are always there for you :)
    </div>
</div>

