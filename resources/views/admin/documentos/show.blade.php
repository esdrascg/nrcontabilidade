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
            {{ $documento->nome }}
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descricao'); !!}
            {{ $documento->descricao }}
        </div>
        <div class="form-group">

            {{ $documento->categorias->implode('nome',',')  }}

        </div>

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary'] ); !!}
        </div>
        {!! Form::close() !!}

</div>
@endsection
