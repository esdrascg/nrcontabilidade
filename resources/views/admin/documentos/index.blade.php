@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="box-header with-border">
        <a href="{{ route('documentos.create') }}"><button type="button" class="btn btn-primary">Novo Documento</button></a>
    </div>
    <div class="box box-primary">
        <table class="table table-condensed">
            <tbody><tr>
                <th style="width: 10px"></th>
                <th>Nome</th>
                <th>Email</th>
                <th style="width: 10px"></th>
                <th style="width: 10px"></th>
                <th style="width: 10px"></th>
            </tr>
            @foreach ($documentos as $documento)

            <?php $nomeformdelete = 'form_delete_'.$documento->id ?>


            <tr>
                <td>{{ $documento->id }}</td>
                <td>{{ $documento->nome }}</td>
                <td>{{ $documento->descricao }}</td>
                <td>
                    <a href="{{ route('documentos.show', ['documentos'=>$documento->id]) }}">
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('documentos.edit', ['documentos'=>$documento->id]) }}">
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['documentos.destroy', 'documento' => $documento->id], 'id'=>$nomeformdelete, 'class' => 'form', 'method' => 'DELETE']) !!}


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
    {{ $documentos->links() }}
@endsection
