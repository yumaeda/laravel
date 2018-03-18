@extends('layouts.base')

@section('title', 'Profile｜Matsune Family')

@section('content')
<div class="profile_body">
    <table>
        <tbody>
            <tr>
                <td>Sex:</td>
                <td>Men</td>
            </tr>
            <tr>
                <td>Blood Type:</td>
                <td>{{ $blood_type }}</td>
            </tr>
            <tr>
                <td>Birthday:</td>
                <td>{{ (new DateTime(auth()->user()->birthday))->format('Y/m/d') }}</td>
            </tr>
        </tbody>
    </table>
    <input type="button" value="Cancel" class="footer_button" onclick="location.href='/';">
    <input type="button" value="Donate" class="footer_button" onclick="location.href='/points';">
</div>
@endsection

