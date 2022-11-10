<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @error('name')
    <small class="text-danger">{{$message}}</small>
    @enderror

    <h2 class="h3 mt-2">Lista de Permisos</h2>
    @php
    $grupo="";
    @endphp
    <div class=col-xxl-8 table-responsive ">

        @foreach ($permissions as $permission)

        @if ($grupo!=$permission->grupo)
        @php
        $grupo = $permission->grupo

        @endphp
        @if ($grupo!="")
        </tr>
        </tbody>
        </table>
        <table class="table table-sm table-striped mb-4">
            <tbody>

                @endif
                <tr>
                    <td style="width: 300px">{{$permission->grupo}}</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                            {{$permission->descripcion}}
                        </label>
                    </td>
                    @else
                    <td>
                        <label>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                            {{$permission->descripcion}}
                        </label>
                    </td>
                    @endif

                    @endforeach
            </tbody>
        </table>
    </div>
</div>


{{-- <div>
    <label>
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
        {{$permission->descripcion}}
    </label>
</div> --}}


{{-- <div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @error('name')
    <small class="text-danger">{{$message}}</small>
    @enderror

    <h2 class="h3 mt-2">Lista de Permisos</h2>
    @foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
            {{$permission->descripcion}}
        </label>
    </div>
    @endforeach
</div> --}}