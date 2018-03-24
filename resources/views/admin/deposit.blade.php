@extends('layouts.admin')

@section('title', '松根ファミリー｜Administration')

@section('content')
<h3>性交の詳細</h3>
<table class="transaction_summary">
    <tbody>
        <tr>
            <td>掘られた人:</td>
            <td>{{ $user_name }}</td>
        </tr>
        <tr>
            <td>獲得ポイント:</td>
            <td>{{ $point }}&nbsp;pt</td>
        </tr>
    </tbody>
</table>
@endsection

@section('footer')
<div class="nav_link_pane">
    <a href="{{ route('admin') }}">Back</a>
</div>
@endsection

