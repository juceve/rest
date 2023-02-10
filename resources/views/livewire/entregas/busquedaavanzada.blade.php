<div>
    <div class="row mb-2 ">
        <label class="mb-2 col-12">
            <small>Busqueda por: código, nombre, apellido, curso</small>
        </label>
        <div class="col-12 col-md-6">
            <div class="input-group mb-3 ">
                <input type="search" class="form-control form-control-sm" wire:model.debounce.500ms="busquedaAvanzada"
                    placeholder="Criterio de busqueda" aria-describedby="button-addon2" id="bAvanzada">
                <button class="btn btn-outline-primary btn-sm" type="button" id="button-addon2"><i class="fas fa-search"
                        wire:click="busquedasAvanzada"></i> Buscar</button>
            </div>
        </div>

    </div>
    <div class="table-responsive container-fluid">

        <table class="table table-bordered table-sm table-hover">
            <thead>
                <tr align="center">
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>CURSO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (!is_null($estudiantes))
                @if ($estudiantes->count() > 0)
                @foreach ($estudiantes as $estudiante)
                <tr style="vertical-align: middle">
                    <td>{{$estudiante->codigo}}</td>
                    <td>{{$estudiante->nombre}}</td>
                    <td align="center">{{$estudiante->curso}}</td>
                    <td align="center">
                        <button class="btn btn-outline-success btn-sm" style="width: 100%" title="Seleccionar" wire:click="seleccionar('{{$estudiante->codigo}}')" data-bs-dismiss="modal"><i
                                class="fas fa-check-circle"></i></button>
                    </td>
                </tr>
                @endforeach
                @endif
                @endif
            </tbody>
        </table>

    </div>

</div>
