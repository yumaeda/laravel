@extends('layouts.base')

@section('title', 'Point｜Matsune Family')

@section('content')
<div class="point_donation_body">
    <span>To:&nbsp;</span>
    @include('inc.user_selector', [ 'users' => $users ])
    <input type="number" value="0" class="point_fld" max="{{ auth()->user()->point }}">&nbsp;pt
    <div class="comment_pane">
        <textarea class="comment_fld" rows="5" placeholder="Write comments before donation."></textarea>
    </div>
    <input type="button" value="Cancel" class="footer_button" onclick="location.href='/profiles';">
    <input type="button" value="Donate" class="footer_button" onclick="swal('!!Error!!', 'ちんこがデカすぎでポイント付与できません。', 'error');">
</div>
@endsection

