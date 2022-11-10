<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $lonchera->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estudiante_id') }}
            {{ Form::text('estudiante_id', $lonchera->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id']) }}
            {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pago_id') }}
            {{ Form::text('pago_id', $lonchera->pago_id, ['class' => 'form-control' . ($errors->has('pago_id') ? ' is-invalid' : ''), 'placeholder' => 'Pago Id']) }}
            {!! $errors->first('pago_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>