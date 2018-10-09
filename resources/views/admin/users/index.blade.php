@extends('adminlte::page')

@section('content')
<div class="container">
        <div class="row">
            @foreach ($usuarios as $usuario)
                <div class="col-4">Link {{ $usuario->id }}</div>
                <div class="col-4">{{ $usuario->name }}</div>
                <div class="col-4"><a href="{{ route('usuarios.edit', ['usuario'=>$usuario->id]) }}"><button type="button" class="btn btn-dark">Editar</button></a></div>
            @endforeach
        </div>
    {{ $usuarios->links() }}
</div>
@endsection
