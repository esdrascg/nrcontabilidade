@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Painel de Controle</h1>
@stop

@section('content')
    <p>Você está logado!</p>

    {!! Modal::named('teste-popup')
    ->withTitle('Example modal title')
    ->withBody('Example modal body')
    ->withFooter('Example modal footer') !!}

@stop