<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group mb-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $tipopago->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('abreviatura') }}
            {{ Form::text('abreviatura', $tipopago->abreviatura, ['class' => 'form-control' . ($errors->has('abreviatura') ? ' is-invalid' : ''), 'placeholder' => 'Abreviatura']) }}
            {!! $errors->first('abreviatura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>    
</div>