@extends('layouts.admin')

@section('title', __('matsune.payment_title'))

@section('content')
@if (session('transactions'))
<h3>乱交の詳細</h3>
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
<form action="{{ route('withdraw') }}" method="POST">
    @if ($errors->any())
    <div class="error_pane">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    {{ csrf_field() }}

    <input type="text" name="store_name" placeholder="{{ __('matsune.store_name_placeholder') }}" class="store_name_fld"><br>
    <div class="select_users_pane">
    <h4>{{ __('matsune.participants') }}</h4>
        @include('inc.users_selector', [ 'users' => $users ])
    </div>
    <div>
        <input type="number" name="yen" value="1000" class="yen_fld" min="0">&nbsp;yen<br>
        <input type="submit" value="{{ __('matsune.pay') }}" class="deposit_button">
    </div>
</form>
@endif
@endsection

@section('footer')
<div class="nav_link_pane">
    <a href="{{ route('admin') }}">{{ __('matsune.back') }}</a>
</div>
@endsection

@section('bottom_script')
<script>

$('.js-multi_user_picker').multiSelect();

</script>
@endsection
