@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        {{ session('message') }}
    </div>
</div>
@endsection
