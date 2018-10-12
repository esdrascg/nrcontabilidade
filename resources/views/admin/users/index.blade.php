@extends('adminlte::page')

@section('content')
<div class="container">

        <div class="box-body no-padding">
              <table class="table">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th></th>
                  </tr>
                @foreach ($usuarios as $usuario)
                  <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td><a href="{{ route('usuarios.edit', ['usuario'=>$usuario->id]) }}"><span class="badge bg-red">Editar</span></a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>

    {{ $usuarios->links() }}
</div>
@endsection
