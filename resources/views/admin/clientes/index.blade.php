@extends('adminlte::page')

@section('content')
<div class="container">

        <div class="row">
            @foreach ($clientes as $cliente)
                <div class="col-4">Link 1</div>
                <div class="col-4">{{ $cliente->nome }}</div>
                <div class="col-4"><a href="{{ route('clientes.edit', ['cliente'=>$cliente->id]) }}">Editar</a></div>
            @endforeach
            </div>

        {{ $clientes->links() }}

    </div>
@endsection
