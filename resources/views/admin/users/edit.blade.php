@extends('adminlte::page')

@section('content')

<div class="container">

        {!! Form::model($usuario, ['route' => ['usuarios.update','usuario'=> $usuario->id], 'class' => 'form', 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome do Usuário'); !!}
            {!! Form::text('name', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
                {!! Form::label('email', 'E-mail'); !!}
                {!! Form::text('email', null, ['class' => 'form-control']); !!}
            </div>
        <div class="form-group">
            {!! Form::submit('Editar', ['class'=>'btn btn-primary'] ); !!}
        </div>
        {!! Form::close() !!}

</div>
@endsection
