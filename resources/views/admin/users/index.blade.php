@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        Usuário Logado: {{$logado}} - {{$codigo_usuario}}
    </div>
    <div class="row">
        {{ Form::model(compact('search'),
            ['class' => 'form-inline', 'method' => 'GET']) }}
        {{ Form::text('search',null, ['lass' => 'form-control']) }}
        {{ Form::submit('Buscar', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    <div class="box-header with-border">
        <a href="{{ route('usuarios.create') }}"><button type="button" class="btn btn-primary">Criar Usuário</button></a>
    </div>
    <div class="box box-primary">
        <table class="table table-condensed">
            <tbody><tr>
                <th style="width: 10px"></th>
                <th>Nome</th>
                <th>Email</th>
                <th style="width: 10px"></th>
                <th style="width: 10px"></th>
            </tr>
            @foreach ($usuarios as $usuario)

            <?php $nomeformdelete = 'form_delete_'.$usuario->id ?>


            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    <a href="{{ route('usuarios.edit', ['usuario'=>$usuario->id]) }}">
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['usuarios.destroy', 'usuario' => $usuario->id], 'id'=>$nomeformdelete, 'class' => 'form', 'method' => 'DELETE']) !!}


                    {!! Form::close() !!}

                    <button type="button" onclick="document.getElementById('{{$nomeformdelete}}').submit();" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $usuarios->links() }}
@endsection
