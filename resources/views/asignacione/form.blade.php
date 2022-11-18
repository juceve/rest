<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('empleado_id') }}
            {{ Form::text('empleado_id', $asignacione->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado Id']) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empresa_id') }}
            {{ Form::text('empresa_id', $asignacione->empresa_id, ['class' => 'form-control' . ($errors->has('empresa_id') ? ' is-invalid' : ''), 'placeholder' => 'Empresa Id']) }}
            {!! $errors->first('empresa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sucursale_id') }}
            {{ Form::text('sucursale_id', $asignacione->sucursale_id, ['class' => 'form-control' . ($errors->has('sucursale_id') ? ' is-invalid' : ''), 'placeholder' => 'Sucursale Id']) }}
            {!! $errors->first('sucursale_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>