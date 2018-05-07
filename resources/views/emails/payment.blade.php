@extends('layouts.email')

@section('title')
    {{ $store_name }}
@endsection

@section('content')
    {{ $donner->first_name }}&nbsp;{{ $donner->last_name }}
    <br><br>
    {{ $point }} points were withdrawn from your account.
@endsection

