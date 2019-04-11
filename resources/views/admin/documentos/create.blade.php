@extends('adminlte::page')

@section('content')



<div class="container">
    <h3>Novo Documento</h3>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Badge::withContents(10) !!}

        {!! Label::danger('Cuidado') !!}

        {!! ProgressBar::info(40) !!}

        {!!
            DropdownButton::normal('Small')
              ->withContents([
                   ['url' => '#', 'label' => 'First'],
                   ['url' => '#', 'label' => 'Second']
                ])
            ->small() !!}

        {!! Form::open(['route' => 'documentos.store', 'class' => 'form']) !!}
        {!! Form::hidden('redirect_to', URL::previous()); !!}

            @include('admin.documentos._form')

            <div class="form-group">
                {!! Form::submit('Criar', ['class'=>'btn btn-primary'] ); !!}
            </div>

        {!! Form::close() !!}

</div>
<script>

    //$(document).ready(function() {
        $('.form-control').select2();
    //});

</script>
@endsection
