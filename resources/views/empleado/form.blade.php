<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
                    is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('cédula') }}
                    {{ Form::text('cedula', $empleado->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? '
                    is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('dirección') }}
                    {{ Form::text('direccion', $empleado->direccion, ['class' => 'form-control' .
                    ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('teléfono') }}
                    {{ Form::text('telefono', $empleado->telefono, ['class' => 'form-control' .
                    ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('Fec. Nacimiento') }}
                    {{ Form::date('fecnacimiento', $empleado->fecnacimiento, ['class' => 'form-control' .
                    ($errors->has('fecnacimiento') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('fecnacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            @if (is_null($empleado->email))
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::email('email', $empleado->email, ['class' => 'form-control' . ($errors->has('email') ? '
                    is-invalid' : ''), 'placeholder' => '' ]) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            @endif

            <div class="col-12 col-md-6 mb-3">
                {{ Form::label('Sucursal asignada') }}
                {!! Form::select('sucursale_id', $sucursales, $empleado->empresa_id?$empleado->empresa_id:null,
                ['class'=>'form-select','placeholder'=>'Seleccione una Sucursal','required']) !!}
                {!! $errors->first('sucursale_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    {{ Form::label('Cargo') }}
                    {!! Form::select('cargoempleado_id', $cargos, $empleado->cargoempleado_id,
                    ['class'=>'form-select','placeholder'=>'Seleccione un Cargo','required']) !!}
                    {!! $errors->first('cargoempleado_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="avatar" class="form-label">Foto de Perfil</label>
                    <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*"
                        onchange="preview_image(event)">
                </div>
                <div class="mb-3">
                    <img id="output_image" style="max-height: 100px" />
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 d-none">
                <div class="form-group">
                    {{ Form::label('user_id') }}
                    {{ Form::text('user_id', $empleado->user_id, ['class' => 'form-control' . ($errors->has('user_id') ?
                    ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
                    {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 d-none">
                <div class="form-group">
                    {{ Form::label('estado') }}
                    {{ Form::text('estado', $empleado->estado?$empleado->estado:true, ['class' => 'form-control' .
                    ($errors->has('estado') ? '
                    is-invalid' : ''), 'placeholder' => 'Estado']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
    </div>
</div>