<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nivelcurso_id') }}
            {{ Form::text('nivelcurso_id', $preciomenu->nivelcurso_id, ['class' => 'form-control' . ($errors->has('nivelcurso_id') ? ' is-invalid' : ''), 'placeholder' => 'Nivelcurso Id']) }}
            {!! $errors->first('nivelcurso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipomenu_id') }}
            {{ Form::text('tipomenu_id', $preciomenu->tipomenu_id, ['class' => 'form-control' . ($errors->has('tipomenu_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipomenu Id']) }}
            {!! $errors->first('tipomenu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $preciomenu->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>