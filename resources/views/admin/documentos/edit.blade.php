@extends('adminlte::page')

@section('content')

<div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($documento, ['route' => ['documentos.update','documento'=> $documento->id], 'class' => 'form', 'method' => 'PUT']) !!}
        {!! Form::hidden('redirect_to', URL::previous()); !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome do Usuário'); !!}
            {!! Form::text('nome', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descricao'); !!}
            {!! Form::text('descricao', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('categorias', 'Categorias'); !!}
            {!! Form::select('categorias[]', $categorias, null, ['class' => 'form-control', 'multiple' => true ]); !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary'] ); !!}
        </div>
        {!! Form::close() !!}

</div>
@endsection
