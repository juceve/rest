<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('menu_id') }}
            {{ Form::text('menu_id', $detallemenu->menu_id, ['class' => 'form-control' . ($errors->has('menu_id') ? ' is-invalid' : ''), 'placeholder' => 'Menu Id']) }}
            {!! $errors->first('menu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catitem_id') }}
            {{ Form::text('catitem_id', $detallemenu->catitem_id, ['class' => 'form-control' . ($errors->has('catitem_id') ? ' is-invalid' : ''), 'placeholder' => 'Catitem Id']) }}
            {!! $errors->first('catitem_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('item_id') }}
            {{ Form::text('item_id', $detallemenu->item_id, ['class' => 'form-control' . ($errors->has('item_id') ? ' is-invalid' : ''), 'placeholder' => 'Item Id']) }}
            {!! $errors->first('item_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>