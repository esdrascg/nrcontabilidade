@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="box-header with-border">
        <a href="{{ route('clientes.create') }}"><button type="button" class="btn btn-primary">Novo Cliente</button></a>
    </div>
    <div class="box box-primary">
        <table class="table table-condensed">
            <tbody><tr>
                <th style="width: 10px"></th>
                <th>Nome</th>
                <th style="width: 10px"></th>
                <th style="width: 10px"></th>
            </tr>
            @foreach ($clientes as $cliente)

            <?php $nomeformdelete = 'form_delete_'.$cliente->id ?>


            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>
                    <a href="{{ route('clientes.edit', ['clientes'=>$cliente->id]) }}">
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['clientes.destroy', 'cliente' => $cliente->id], 'id'=>$nomeformdelete, 'class' => 'form', 'method' => 'DELETE']) !!}


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
    {{ $clientes->links() }}
@endsection

