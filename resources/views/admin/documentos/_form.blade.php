<div class="form-group">
    {!! Form::label('nome', 'Nome do Usuário'); !!}
    {!! Form::text('nome', null, ['class' => 'form-control']); !!}
</div>
<div class="form-group">
    {!! Form::label('descricao', 'Descricao'); !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']); !!}
</div>
<div class="form-group">
    {!! Form::label('categorias', 'Categorias'); !!}
    {!! Form::select('categorias[]', $categorias, null, ['class' => 'form-control', 'multiple' => true ]); !!}
</div>