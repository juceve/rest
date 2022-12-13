<div>
    @section('template_title')
    Menu Programado |
    @endsection
    <h4 class="text-center">PROGRAMACIÓN DE EVENTOS</h4> <hr>
    <div class="container d-none d-md-block text-center">
        <small class="text-info">(Seleccione una fecha)</small>
        <div id='calendar' wire:ignore></div>
    </div>

    <div class="form-group d-md-none">        
       
        <div class="form-group mb-2">
            <label for="">Fecha:</label>
            <input type="date" id="fecMovil" class="form-control" value="{{date('Y-m-d')}}">
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-info" type="button" onclick="newEvent(fecMovil.value)">Seleccionar</button>
        </div>
    </div>


    <!-- MODAL EVENTOS DEL DIA  -->
    <div wire:ignore.self class="modal fade" id="modalEventDay" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">DATOS DEL EVENTO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="cancelar"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="fecha" class="control-label col-form-label">Fecha:</label>
                        <input wire:model="fecha" type="date" class="form-control" name="fecha" id="fecha"
                            style="width:100%" required>
                        @error('fecha')
                        <span class="text-danger">{{ message }}</span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-6" style="background-color: rgb(197, 231, 245)">
                            <span class="mt-2">MERIENDA</span>
                            <select class="form-select mt-2 mb-2" wire:model="meriendaid">
                                <option value="">Seleccione</option>
                                @if(!is_null($meriendas))
                                @foreach ($meriendas as $merienda)
                                <option value="{{$merienda->id}}">{{$merienda->nombre}}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            @if (!is_null($itemsMerienda))

                            <label for="">Productos:</label>
                            <ul>
                                @if ($itemsMerienda)

                                @foreach ($itemsMerienda as $merienda)
                                <li>{{$merienda->catitem->nombre . ": " . $merienda->item->nombre}}</li>
                                @endforeach
                                @endif
                            </ul>
                            <div class="form-group mb-2">
                                <label for="">Stock:</label>
                                <input type="number" class="form-control" wire:model="stockMerienda">
                            </div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6 " style="background-color: rgb(203, 241, 201)">
                            <span class="mt-2">ALMUERZO</span>
                            <select class="form-select mt-2 mb-2" wire:model="almuerzoid">
                                <option value="">Seleccione</option>
                                @if(!is_null($almuerzos))
                                @foreach ($almuerzos as $almuerzo)
                                <option value="{{$almuerzo->id}}">{{$almuerzo->nombre}}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            @if ($itemsAlmuerzo)

                            <label>Productos:</label>
                            <ul>
                                @if ($itemsAlmuerzo)
                                @foreach ($itemsAlmuerzo as $almuerzo)
                                <li>{{$almuerzo->catitem->nombre . ": " . $almuerzo->item->nombre}}</li>
                                @endforeach
                                @endif
                            </ul>
                            <div class="form-group mb-2">
                                <label for="">Stock:</label>
                                <input type="number" class="form-control" wire:model="stockAlmuerzo">
                            </div>
                            @endif

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" style="width: 200px"
                        data-bs-backdrop="false" wire:click="cancelar">Cancelar</button>
                    <button class="btn btn-danger d-none" id="eliminar" style="width: 200px" wire:click="destroy"
                        onclick="loading()">Eliminar</button>
                    <button class="btn btn-primary" style="width: 200px" wire:click="save"
                        onclick="loading()">Guardar</button>
                </div>
            </div>
        </div>


        <!-- FIN MODALES -->
        @section('js')
        <script>
            // INICIALIZACION DEL COMPONENTE CALENDAR CON TODAS SUS CONFIGURACIONES INICIALES
        $(document).ready(function () {
            var d = new Date();
            var mes = d.getMonth()+1;
            var anio = d.getFullYear();
            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                initialView: 'dayGridMonth',
                customButtons: {
                    btnToday: {
                        text: 'Hoy',
                        click: function() {
                            calendar.today();
                            var titulo = $('#fc-dom-1').html();
                            const myArray = titulo.split(" ");
                            Livewire.emit('cambiaMes', myArray[0].toUpperCase());
                        }
                    }
                },                
                headerToolbar: {
                    center: 'title',
                    end: 'dayGridMonth,timeGridWeek',
                    start: 'prev btnToday next'
                },
                buttonText:{
                    'week':'Semana',
                    'month':'Mes',
                    'day':'Dia',
                },
                timeZone: 'America/La_Paz',
                selectable: true,
                locale: 'es',
                slotDuration:"00:30:00",
                slotMinTime:"08:00:00",
                slotMaxTime:"15:00:00",
                eventSources: [{
                        url: "{{route('events')}}",
                    }

                ],            
               dateClick: function(info) {
                
                    newEvent(info.dateStr);
                },
                
            });
            calendar.render();
        });
            

        /////////////////////////////////////////////////////////////////////////////////////////
        // FUNCIONES //////////////////////////////////
        function newEvent(dateSelected) {
            limpiaModal();
            var fecha = dateSelected.slice(0, 10);
            @this.set('fecha',fecha);
            $('#fecha').val(fecha);
            $('#modalEventDay').modal('show');
        }

        function limpiaModal() {
            $('#fecha').val('');  
        }

        Livewire.on('success',message=>{
                Swal.fire(
                    'Exito!',
                    message,
                    'success'
                )
           });

        Livewire.on('error',message=>{
            // $('#modalEventDay').modal('hide');
                Swal.fire(
                    'Error',
                    message,
                    'error'
                )
           });
        Livewire.on('onDelete',function(){
            $('#eliminar').removeClass('d-none');
        });

        </script>
        @endsection

    </div>