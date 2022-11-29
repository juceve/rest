<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @error('name')
    <small class="text-danger">{{$message}}</small>
    @enderror

    <h2 class="h3 mt-3 mb-2">Lista de Permisos</h2>
    <button type="button" class="btn btn-info mb-2" style="width: 250px" onclick="selectAll()">Seleccionar
        todos</button>
    <button type="button" class="btn btn-primary mb-2" style="width: 250px" onclick="unSelectAll()">No seleccionar
        nada</button>
    @php
    $grupo="";
    @endphp


    <div class="row">
        @foreach ($permissions as $permission)

        @if($grupo == $permission->grupo)

        <div class="col-12 form-group p-2 border">
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                {{$permission->descripcion}}
            </label>
        </div>
        @else
        @if ($grupo=="")
        <div class="col-12 col-md-4 mt-3">
            <div class="row gx-3">
                @else
            </div>
        </div>
        <div class="col-12 col-md-4 mt-3">
            <div class="row gx-3">
                @endif
                @php
                $grupo = $permission->grupo;
                @endphp
                <div class="col-12 form-group p-2 border bg-primary text-white">{{$permission->grupo}}</div>
                <div class="col-12 form-group p-2 border">
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                    {{$permission->descripcion}}
                </div>

                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>