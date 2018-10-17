@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <a href="{{ route('usuarios.create') }}"><button type="button" class="btn btn-primary">Criar Usuário</button></a>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4"></div>
    </div>
    <div class="box box-primary">
        <table class="table table-condensed">
            <tbody><tr>
                <th style="width: 10px">#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>#</th>
                <th>#</th>
            </tr>
            @foreach ($usuarios as $usuario)

            <?php $nomeformdelete = 'form_delete_'.$usuario->id ?>


            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td><a href="{{ route('usuarios.edit', ['usuario'=>$usuario->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a></td>
                <td>
                    {!! Form::open(['route' => ['usuarios.destroy', 'usuario' => $usuario->id], 'id'=>$nomeformdelete, 'class' => 'form', 'method' => 'DELETE']) !!}
                        {!! Form::submit('Excluir', ['class'=>'btn btn-danger'] ); !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $usuarios->links() }}
@endsection
