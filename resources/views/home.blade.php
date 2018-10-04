@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>

@stop

@section('content')
    <p>You are logged in!</p>
    <p><a href="{{ route("usuarios.index") }}" >Usuarios</a></p>
    <p><a href="{{ route("categorias.index") }}" >Categorias</a></p>

@stop
