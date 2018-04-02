@extends('layouts.admin')

@section('title', __('matsune.payment_title'))

@section('content')
<input type="text" placeholder="{{ __('matsune.store_name_placeholder') }}" class="store_name_fld"><br>
<div class="select_users_pane">
<h4>{{ __('matsune.participants') }}</h4>
    @include('inc.users_selector', [ 'users' => $users ])
</div>
<div>
    <input type="number" name="yen" value="1000" class="yen_fld" min="0">&nbsp;yen<br>
    <input type="button" value="{{ __('matsune.pay') }}" onclick="swal('!!Error!!', '{{ __("matsune.payment_error") }}', 'error');" class="deposit_button">
</div>
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
