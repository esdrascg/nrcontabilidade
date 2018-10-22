@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
    <p><a href="{{ route("usuarios.index") }}" >Usuarios</a></p>
    <p><a href="{{ route("categorias.index") }}" >Categorias</a></p>

    <ul class="menu">
      <li>
        <a href="{{ route("usuarios.index") }}">
          <div class="pull-left">

          </div>
          <h4>
            Usuarios
          </h4>
        </a>
      </li>
      <li>
        <a href="{{ route("clientes.index") }}">
          <div class="pull-left">

          </div>
          <h4>
            Clientes
          </h4>
        </a>
      </li>
      <li>
        <a href="{{ route("categorias.index") }}">
          <div class="pull-left">
            
          </div>
          <h4>
            Categorias
          </h4>
        </a>
      </li>
    </ul>
@stop
