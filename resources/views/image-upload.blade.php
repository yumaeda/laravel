@extends('layouts.base')

@section('title', __('matsune.edit_profile_image'))

@section('content')
<div class="profile_body">
@if (count($errors) > 0)
    {{ __('matsune.image_upload_error') }}
    <br><br>
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif
@if (Session::get('success'))
    <strong>{{ __('matsune.image_upload_sucess') }}</strong>
    <img src="{{ Session::get('path') }}" style="width: 100%;">
@endif
    <form action="{{ url('s3-image-upload') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="image" class="footer_button">
        <input type="submit" class="footer_button" value="{{ __('matsune.edit_profile_image') }}">
    </form>
    <input type="button" value="{{ __('matsune.back') }}" class="footer_button" onclick="location.href='/profiles/';">
</div>
@endsection

