<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group mb-3">
            {{ Form::label('Razón social') }}
            {{ Form::text('razonsocial', $empresa->razonsocial, ['class' => 'form-control' .
            ($errors->has('razonsocial') ? ' is-invalid' : ''), 'placeholder' => 'Razonsocial']) }}
            {!! $errors->first('razonsocial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('Dirección') }}
                    {{ Form::text('direccion', $empresa->direccion, ['class' => 'form-control' .
                    ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('Teléfono') }}
                    {{ Form::text('telefono', $empresa->telefono, ['class' => 'form-control' . ($errors->has('telefono')
                    ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('email') }}
                    {{ Form::text('email', $empresa->email, ['class' => 'form-control' . ($errors->has('email') ? '
                    is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('NIT') }}
                    {{ Form::text('nit', $empresa->nit, ['class' => 'form-control' . ($errors->has('nit') ? '
                    is-invalid' : ''), 'placeholder' => 'Nit']) }}
                    {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('responsable') }}
                    {{ Form::text('responsable', $empresa->responsable, ['class' => 'form-control' .
                    ($errors->has('responsable') ? ' is-invalid' : ''), 'placeholder' => 'Responsable']) }}
                    {!! $errors->first('responsable', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('Teléfono_Resp.') }}
                    {{ Form::text('telefono_responsable', $empresa->telefono_responsable, ['class' => 'form-control' .
                    ($errors->has('telefono_responsable') ? ' is-invalid' : ''), 'placeholder' => 'Telefono
                    Responsable']) }}
                    {!! $errors->first('telefono_responsable', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">

                <div class="mb-3">
                    <label for="avatar" class="form-label">Imagen de la Empresa</label>
                    <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*" onchange="preview_image(event)">
                    
                </div>
                <div class="mb-3">
                    <img id="output_image" style="max-height: 100px"/>
                </div>
                
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('moneda') }}
                    {{ Form::select('moneda_id', $monedas,$empresa->moneda_id, ['class' => 'form-select' .
                    ($errors->has('moneda_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una Moneda']) }}
                    {!! $errors->first('moneda_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="form-group mb-3 d-none">
                {{ Form::label('estado') }}
                {{ Form::text('estado', $empresa->estado?$empresa->estado:true, ['class' => 'form-control' . ($errors->has('estado') ? '
                is-invalid' : ''), 'placeholder' => 'Estado']) }}
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
    </div>
    
</div>
