@extends('layouts.email')

@section('title')
    {{ $donner->first_name }}&nbsp;{{ $donner->last_name }}
@endsection

@section('content')
    {{ $point }} points were withdrawn from your account.
@endsection

