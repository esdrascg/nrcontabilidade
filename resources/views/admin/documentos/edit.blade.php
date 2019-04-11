@extends('adminlte::page')

@section('content')

<div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($documento, ['route' => ['documentos.update','documento'=> $documento->id], 'class' => 'form', 'method' => 'PUT']) !!}
        {!! Form::hidden('redirect_to', URL::previous()); !!}


        @include('admin.documentos._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary'] ); !!}
        </div>
        {!! Form::close() !!}

</div>
@endsection
