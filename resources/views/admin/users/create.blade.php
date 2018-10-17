@extends('adminlte::page')

@section('content')

<div class="container">
    <h3>Novo Usuário</h3>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['route' => 'usuarios.store', 'class' => 'form']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome'); !!}
            {!! Form::text('name', null, ['class' => 'form-control']); !!}

            {!! Form::label('email', 'E-mail'); !!}
            {!! Form::text('email', null, ['class' => 'form-control']); !!}

            {!! Form::label('password', 'PassWord'); !!}
            {!! Form::text('password', null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Criar', ['class'=>'btn btn-primary'] ); !!}
        </div>
        {!! Form::close() !!}

</div>
@endsection
