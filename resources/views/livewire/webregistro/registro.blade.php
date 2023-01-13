<div>
    
    <div class="content">
        <div class="section-title text-center">
            <h2></h2>
            <p>Datos del Tutor</p>

        </div>
    </div>
    <div class="row justify-content-md-center text-start mb-3">

        <div class="col col-lg-1">
            <label style="color: #cda45e">Cedula:</label>
        </div>
        <div class="col col-8 col-lg-4">
            <input type="text" class="form-control bg-dark text-white" wire:model.debounce.1000ms="busqueda"
                id="busqueda">
            <div class="spinner-border spinner-border-sm" role="status" wire:loading style="color: #cda45e">
                <span class="visually-hidden">Cargando...</span>
            </div>
        </div>

    </div>
    <div class="row justify-content-md-center text-start mb-3">

        <div class="col col-lg-1">
            <label style="color: #cda45e">Nombre:</label>
        </div>
        <div class="col col-8 col-lg-4">
            <input type="text" class="form-control bg-dark text-white" wire:model.defer="nombreT" id="nombreT">
        </div>
    </div>

    <div class="row justify-content-md-center text-start mb-3">
        <div class="col col-lg-1">
            <label style="color: #cda45e">Celular:</label>
        </div>
        <div class="col col-8 col-lg-4">
            <input type="text" class="form-control bg-dark text-white" wire:model.defer="telefonoT" id="telefonoT">
        </div>
    </div>

    <div class="row justify-content-md-center text-start mb-3">
        <div class="col col-lg-1">
            <label style="color: #cda45e"></label>
        </div>
        <div class="col col-8 col-lg-4 d-grid gap-2">
            <button class="btn text-white rounded-5 {{$dnone}}" style="background-color: #cda45e"
                onclick="registrarTutor()">Registrar</button>
        </div>
    </div>
    <div class="content {{$dnoneEstudiantes}}">
        <hr>
        <h3 class="h5 text-center" style="color: #cda45e">
            ESTUDIANTES REGISTRADOS A SU CARGO
        </h3>
        <div class="row justify-content-md-center text-start mb-3">
            <div class="table-responsive">
                <table class="table table-bordered table-success">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>CEDULA</th>
                            <th>TELEFONO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!is_null($estudiantes))
                        @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{$estudiante->nombre}}</td>
                            <td>{{$estudiante->cedula}}</td>
                            <td>{{$estudiante->telefono}}</td>
                            <td width="50px" align="right">
                                <button class="btn btn-warning" title="Eliminar"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="col-12" {{$dnoneEstudiantes}}>
                <h5 style="color: #cda45e">NUEVO ESTUDIANTE</h5>
                <div class="row">
                    <div class="col-12 col-md-3 mb-3">
                        <label style="color: #cda45e">Nombre:</label>
                        <input type="text" class="form-control" wire:model.defer="nombreE" id="nombreE">
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label style="color: #cda45e">Cedula:</label>
                        <input type="text" class="form-control" wire:model.defer="cedulaE" id="cedulaE">
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label style="color: #cda45e">Telefono:</label>
                        <input type="text" class="form-control" wire:model.defer="telefonoE" id="telefonoE">
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label style="color: #cda45e">Curso:</label>
                        <select class="form-select" wire:model.defer="cursoE">                            
                            @if (!is_null($cursos))
                                @foreach ($cursos as $curso)
                                <option value="{{$curso->id}}">{{$curso->nivelecurso->nombre . " - " . $curso->nombre}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <button class="btn btn-warning btn-block" onclick="registrarEstudiante()">Registrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>






    @section('js')
    <script>
        function registrarTutor(){
                if((document.getElementById('busqueda').value != "") 
                && (document.getElementById('nombreT').value != "") 
                && (document.getElementById('telefonoT').value != ""))
                {
                    Livewire.emit('registrarTutor');
                }else{
                    Swal.fire(
                    'Atención!',
                    'Todos los campos deben llenarse',
                    'warning'
                    )
                }
                
            }

            function registrarEstudiante(){
                if((document.getElementById('cedulaE').value != "") 
                && (document.getElementById('nombreE').value != "") 
                && (document.getElementById('telefonoE').value != ""))
                {
                    Livewire.emit('registrarEstudiante');
                }else{
                    Swal.fire(
                    'Atención!',
                    'Todos los campos deben llenarse',
                    'warning'
                    )
                }
                
            }

            function asignarColegio(id){
                @this.set('colegio',id);
            }

            Livewire.on('warning',message=>{
                Swal.fire(
                    'Exito',
                    message,
                    'success'
                )
           });

           Livewire.on('error',message=>{
                Swal.fire(
                    'Error',
                    message,
                    'error'
                )
           });
    </script>
    @endsection
</div>