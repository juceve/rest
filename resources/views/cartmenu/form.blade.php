<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('session') }}
            {{ Form::text('session', $cartmenu->session, ['class' => 'form-control' . ($errors->has('session') ? ' is-invalid' : ''), 'placeholder' => 'Session']) }}
            {!! $errors->first('session', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('menu_id') }}
            {{ Form::text('menu_id', $cartmenu->menu_id, ['class' => 'form-control' . ($errors->has('menu_id') ? ' is-invalid' : ''), 'placeholder' => 'Menu Id']) }}
            {!! $errors->first('menu_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>