@extends('layouts.auth')

@section('content')
    <a href="{{ session('link') }}">Login</a>
@endsection