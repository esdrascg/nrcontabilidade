@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="box-header with-border">
        <a href="{{ route('categorias.create') }}"><button type="button" class="btn btn-primary">Novo Categoria</button></a>
    </div>
    <div class="box box-primary">
        <table class="table table-condensed">
            <tbody><tr>
                <th style="width: 10px"></th>
                <th>Nome</th>
                <th>-</th>
                <th style="width: 10px"></th>
                <th style="width: 10px"></th>
            </tr>
            @foreach ($categorias as $categoria)

            <?php $nomeformdelete = 'form_delete_'.$categoria->id ?>


            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->descricao }}</td>
                <td>
                    <a href="{{ route('categorias.edit', ['categorias'=>$categoria->id]) }}">
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['categorias.destroy', 'categoria' => $categoria->id], 'id'=>$nomeformdelete, 'class' => 'form', 'method' => 'DELETE']) !!}


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
    {{ $categorias->links() }}
@endsection
