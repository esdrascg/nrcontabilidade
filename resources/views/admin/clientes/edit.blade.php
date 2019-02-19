@extends('adminlte::page')

@section('content')
<div class="container">

                {!! Form::model($cliente, ['route' => ['clientes.update', 'cliente'=>$cliente->id], 'class'=>'form', 'method'=>'PUT' ]) !!}
                <div class="box-body">

                  <div class="form-group">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::label('nome', 'Nome do Cliente'); !!}
                    {!! Form::text('nome',null,['class'=>'form-control']); !!}
                  </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  {!! Form::submit('Editar', ['class'=>'btn btn-primary']); !!}
                </div>
              </form>
        {!! Form::close() !!}
</div>
@endsection
