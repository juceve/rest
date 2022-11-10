<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('item_id') }}
            {{ Form::text('item_id', $detallelonchera->item_id, ['class' => 'form-control' . ($errors->has('item_id') ? ' is-invalid' : ''), 'placeholder' => 'Item Id']) }}
            {!! $errors->first('item_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lonchera_id') }}
            {{ Form::text('lonchera_id', $detallelonchera->lonchera_id, ['class' => 'form-control' . ($errors->has('lonchera_id') ? ' is-invalid' : ''), 'placeholder' => 'Lonchera Id']) }}
            {!! $errors->first('lonchera_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>