@extends('adminlte::page')

@section('content')

<div class="container">
    <h3>Nova Categoria</h3>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['route' => 'documentos.store', 'class' => 'form']) !!}
        {!! Form::hidden('redirect_to', URL::previous()); !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome'); !!}
            {!! Form::text('nome', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição'); !!}
            {!! Form::text('descricao', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'PassWord'); !!}
            {!! Form::password('password', ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Criar', ['class'=>'btn btn-primary'] ); !!}
        </div>
        {!! Form::close() !!}

</div>
@endsection
