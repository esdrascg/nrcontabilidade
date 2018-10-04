@extends('adminlte::page')

@section('content')
<div class="container">

        <div class="row">
            @foreach ($categorias as $categoria)
                <div class="col-4">Link 1</div>
                <div class="col-4">{{ $categoria->nome }}</div>
                <div class="col-4"><a href="{{ $categoria->id }}"><button type="button" class="btn btn-dark">Editar</button></a></div>
            @endforeach
            </div>

        {{ $categorias->links() }}

    </div>
@endsection
