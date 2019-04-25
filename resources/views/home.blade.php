@extends('adminlte::page')

@section('title', 'Sistema Teste')

@section('content_header')
    <h1>Painel de Controle</h1>
@stop

@section('content')
    <p>Você está logado!</p>

    {!! Modal::named('teste-popup')
    ->withTitle('Example modal title')
    ->withBody('Example modal body')
    ->withFooter('Example modal footer'); !!}

    <a class="btn btn-app">
        <i class="fa fa-play"></i> Play
    </a>

    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
        Launch Info Modal
    </button>

    <div class="modal modal-info fade" id="modal-info" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Informação</h4>
                </div>
                <div class="modal-body">
                    <p>Informação aqui…</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-outline">Salvar alterações</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop