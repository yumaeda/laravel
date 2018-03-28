@extends('layouts.base')

@section('title', __('matsune.point_title'))

@section('content')
<div class="point_donation_body">
    <span>To:&nbsp;</span>
    @include('inc.user_selector', [ 'users' => $users ])
    <input type="number" value="0" class="point_fld" max="{{ auth()->user()->point }}">&nbsp;pt
    <div class="comment_pane">
        <textarea class="comment_fld" rows="5" placeholder="{{ __('matsune.comment_placeholder') }}"></textarea>
    </div>
    <input type="button" value="{{ __('matsune.back') }}" class="footer_button" onclick="location.href='/profiles/';">
    <input type="button" value="{{ __('matsune.donate_point') }}" class="footer_button" onclick="swal('!!Error!!', '{{ __("matsune.point_donation_error") }}', 'error');">
</div>
@endsection

