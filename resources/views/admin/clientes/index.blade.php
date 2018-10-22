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
        @foreach ($clientes as $cliente)
          <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td><a href="{{ route('usuarios.edit', ['cliente'=>$cliente->id]) }}"><span class="badge bg-red">Editar</span></a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {{ $clientes->links() }}
</div>
@endsection
