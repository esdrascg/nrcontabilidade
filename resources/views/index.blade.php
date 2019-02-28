@extends('adminlte::page')

@section('content')
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
@endif
<div class="container">

    <div class="row">

        <div class="col-4">user</div>

    </div>
</div>
@endsection
