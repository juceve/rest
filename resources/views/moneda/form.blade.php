<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $moneda->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('abreviatura') }}
            {{ Form::text('abreviatura', $moneda->abreviatura, ['class' => 'form-control' . ($errors->has('abreviatura') ? ' is-invalid' : ''), 'placeholder' => 'Abreviatura']) }}
            {!! $errors->first('abreviatura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tasacambio') }}
            {{ Form::text('tasacambio', $moneda->tasacambio, ['class' => 'form-control' . ($errors->has('tasacambio') ? ' is-invalid' : ''), 'placeholder' => 'Tasacambio']) }}
            {!! $errors->first('tasacambio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('predeterminado') }}
            {{ Form::text('predeterminado', $moneda->predeterminado, ['class' => 'form-control' . ($errors->has('predeterminado') ? ' is-invalid' : ''), 'placeholder' => 'Predeterminado']) }}
            {!! $errors->first('predeterminado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>