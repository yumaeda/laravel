@extends('layouts.email')

@section('title')
    {{ $donner->first_name }}&nbsp;{{ $donner->last_name }}
@endsection

@section('content')
    {{ $point }} points were deposit to your account.<br>
@endsection

