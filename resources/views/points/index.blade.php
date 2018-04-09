@extends('layouts.base')

@section('title', __('matsune.point_title'))

@section('content')
@if (session('transactions'))
<h3>レイプの詳細</h3>
<table class="transaction_summary">
    <tbody>
        @foreach (session('transactions') as $transaction)
        <tr>
            <td>掘られた人:</td>
            <td>{{ $transaction['user_name'] }}</td>
        </tr>
        <tr>
            <td>痔の治療費:</td>
            <td>{{ $transaction['point'] }}&nbsp;pt</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<form action="{{ route('donate') }}" method="POST">
    {{ csrf_field() }}
    <div class="point_donation_body">
        <span>To:&nbsp;</span>
        @include('inc.user_selector', [ 'users' => $users ])
        <input type="number" value="0" class="point_fld" max="{{ auth()->user()->point }}" name="yen">&nbsp;pt
        <div class="comment_pane">
            <textarea class="comment_fld" rows="5" placeholder="{{ __('matsune.comment_placeholder') }}" name="comment"></textarea>
        </div>
        <input type="button" value="{{ __('matsune.back') }}" class="footer_button" onclick="location.href='/profiles/';">
        <input type="submit" value="{{ __('matsune.donate_point') }}" class="footer_button">
    </div>
</form>
@endif
@endsection

