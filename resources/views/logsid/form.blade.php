<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idgenerado') }}
            {{ Form::text('idgenerado', $logsid->idgenerado, ['class' => 'form-control' . ($errors->has('idgenerado') ? ' is-invalid' : ''), 'placeholder' => 'Idgenerado']) }}
            {!! $errors->first('idgenerado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tabla') }}
            {{ Form::text('tabla', $logsid->tabla, ['class' => 'form-control' . ($errors->has('tabla') ? ' is-invalid' : ''), 'placeholder' => 'Tabla']) }}
            {!! $errors->first('tabla', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $logsid->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>