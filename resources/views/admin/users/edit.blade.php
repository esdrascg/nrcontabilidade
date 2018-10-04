@extends('adminlte::page')

@section('content')
<div class="container">
    <form action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>
@endsection
