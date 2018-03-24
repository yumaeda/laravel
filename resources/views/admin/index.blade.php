@extends('layouts.admin')

@section('title', '松根ファミリー｜Administration')

@section('content')
<form action="{{ route('deposit') }}" method="POST">
    {{ csrf_field() }}
    <div>
    入チン先:&nbsp;
    @include('inc.user_selector', [ 'users' => $users ])
    <input type="number" name="yen" value="10000" class="yen_fld" min="0">&nbsp;yen<br>
    </div>
    <input type="submit" value="挿入" class="deposit_button">
</form>
@endsection

@section('footer')
@if (Route::has('login'))
    <div class="nav_link_pane">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
@endif
@endsection
