<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $curso->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nivelcurso_id') }}
            {{ Form::text('nivelcurso_id', $curso->nivelcurso_id, ['class' => 'form-control' . ($errors->has('nivelcurso_id') ? ' is-invalid' : ''), 'placeholder' => 'Nivelcurso Id']) }}
            {!! $errors->first('nivelcurso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>