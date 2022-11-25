<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $item->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
                    is-invalid'
                    : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="exampleInputIconRight">Categoria</label>
                    <div class="input-group">
                        {{ Form::select('catitem_id', $categorias,$item->catitem_id, ['class' => 'form-select' .
                        ($errors->has('catitem_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una categoria']) }}
                        <button type="button" class="input-group-text px-3 bg-primary text-white" id="basic-addon2"
                            title="Agregar Nuevo" data-bs-toggle="modal" data-bs-target="#modalNuevaCategoria">
                            <i class="fas fa-plus"></i>
                        </button>
                        {!! $errors->first('catitem_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    @error('catitem_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('descripcion') }}
                    {{ Form::text('descripcion', $item->descripcion, ['class' => 'form-control' .
                    ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('imagen') }}
                    {{ Form::text('imagen', $item->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? '
                    is-invalid' : ''), 'placeholder' => 'Imagen']) }}
                    {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('estado') }}
                    {{ Form::text('estado', $item->estado?$item->estado:true, ['class' => 'form-control' .
                    ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>

</div>