@extends('adminlte::page')

@section('content')
<div class="container">
    {!! Form::open(['route' => 'usuarios.store', 'class'=>'form' ]) !!}
    <div class="box-body">

      <div class="form-group">
        {!! Form::label('name', 'Nome Completo'); !!}
        {!! Form::text('name',null,['class'=>'form-control']); !!}
      </div>
      <div class="form-group">
        {!! Form::label('email', 'Email'); !!}
        {!! Form::email('email',null,['class'=>'form-control']); !!}
      </div>
      <div class="form-group">
        {!! Form::label('password', 'Password'); !!}
        {!! Form::password('password',null,['class'=>'form-control']); !!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Criar Usuário', ['class'=>'btn btn-primary']); !!}
    </div>
  </form>
  {!! Form::close() !!}
</div>
@endsection
