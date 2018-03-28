@extends('layouts.base')

@section('title', __('matsune.profile_title'))

@section('content')
<div class="profile_body">
    <table>
        <tbody>
            <tr>
                <td>{{ __('matsune.sex') }}:</td>
                <td>Men</td>
            </tr>
            <tr>
                <td>{{ __('matsune.blood_type') }}:</td>
                <td>{{ $blood_type }}</td>
            </tr>
            <tr>
                <td>{{ __('matsune.birthday') }}:</td>
                <td>{{ (new DateTime(auth()->user()->birthday))->format('Y/m/d') }}</td>
            </tr>
        </tbody>
    </table>
    <input type="button" value="{{ __('matsune.back') }}" class="footer_button" onclick="location.href='/';">
    <input type="button" value="{{ __('matsune.donate_point') }}" class="footer_button" onclick="location.href='/points/';">
</div>
@endsection

