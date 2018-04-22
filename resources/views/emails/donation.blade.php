@extends('layouts.email')

@section('title')
    {{ $recipient->first_name }}&nbsp;{{ $recipient->last_name }}
@endsection

@section('content')
    {{ $donner->first_name }}&nbsp;{{ $donner->last_name }}&nbsp;gave you {{ $point }} points!! 
    <br><br>
    <h3>[Comment]</h3>
    <p>{{ $comment }}</p>
@endsection

