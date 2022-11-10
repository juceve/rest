<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('evento_id') }}
            {{ Form::text('evento_id', $detalleevento->evento_id, ['class' => 'form-control' . ($errors->has('evento_id') ? ' is-invalid' : ''), 'placeholder' => 'Evento Id']) }}
            {!! $errors->first('evento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('menu_id') }}
            {{ Form::text('menu_id', $detalleevento->menu_id, ['class' => 'form-control' . ($errors->has('menu_id') ? ' is-invalid' : ''), 'placeholder' => 'Menu Id']) }}
            {!! $errors->first('menu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>