@extends('layouts.email')

@section('title')
    Store:&nbsp;{{ $store_name }}
@endsection

@section('content')
    &gt;&gt;&gt;&nbsp;{{ $donner->first_name }}&nbsp;{{ $donner->last_name }}
    <br><br>
    {{ $point }} points were withdrawn from your account.
@endsection

