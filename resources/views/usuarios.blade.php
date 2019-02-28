@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        @foreach ($usuarios as $user)
            <div class="col-4">Link {{ $user->id }}</div>
            <div class="col-4">{{ $user->name }}</div>
            <div class="col-4"><a href="{{ route("usuarios.edit", ['usuario'=> $user->id] )}}"><button type="button" class="btn btn-dark">Editar</button></a></div>
        @endforeach
    </div>

    {{ $usuarios->links() }}

</div>
@endsection
