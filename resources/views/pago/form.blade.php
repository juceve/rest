<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('recibo') }}
            {{ Form::text('recibo', $pago->recibo, ['class' => 'form-control' . ($errors->has('recibo') ? ' is-invalid' : ''), 'placeholder' => 'Recibo']) }}
            {!! $errors->first('recibo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipopago_id') }}
            {{ Form::text('tipopago_id', $pago->tipopago_id, ['class' => 'form-control' . ($errors->has('tipopago_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipopago Id']) }}
            {!! $errors->first('tipopago_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipopago') }}
            {{ Form::text('tipopago', $pago->tipopago, ['class' => 'form-control' . ($errors->has('tipopago') ? ' is-invalid' : ''), 'placeholder' => 'Tipopago']) }}
            {!! $errors->first('tipopago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sucursal_id') }}
            {{ Form::text('sucursal_id', $pago->sucursal_id, ['class' => 'form-control' . ($errors->has('sucursal_id') ? ' is-invalid' : ''), 'placeholder' => 'Sucursal Id']) }}
            {!! $errors->first('sucursal_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sucursal') }}
            {{ Form::text('sucursal', $pago->sucursal, ['class' => 'form-control' . ($errors->has('sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Sucursal']) }}
            {!! $errors->first('sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('importe') }}
            {{ Form::text('importe', $pago->importe, ['class' => 'form-control' . ($errors->has('importe') ? ' is-invalid' : ''), 'placeholder' => 'Importe']) }}
            {!! $errors->first('importe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('venta_id') }}
            {{ Form::text('venta_id', $pago->venta_id, ['class' => 'form-control' . ($errors->has('venta_id') ? ' is-invalid' : ''), 'placeholder' => 'Venta Id']) }}
            {!! $errors->first('venta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $pago->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>