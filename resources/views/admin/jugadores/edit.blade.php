@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.content.jugadores.index')])
    @include('admin.jugadores.modal-player-title')
    <x-content-section title="{{__('balonmano.ttl_jugadores_editar')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true
                    action="{{route('admin.content.jugadores.update', $player->id)}}" api='PUT'>
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group col-sm-6">
                            <x-form-textfield id="name" :required="true" label="{{__('balonmano.lbnombreApellido')}}"
                                              :modelo="$player"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-file-image id="image" :required="true" help="{{__('balonmano.extensiones')}}" label="{{__('balonmano.lbimagen')}}"
                                               showList="list_image" :modelo="$player" accept="image/*"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-textfield id="measure" :required="true" label="{{__('balonmano.lbmedida')}}"
                                              :modelo="$player"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-textfield id="weigth" :required="true" label="{{__('balonmano.lbpeso')}}"
                                              :modelo="$player"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-enum id="years_experience" required="true" label="{{__('balonmano.lbexperiencia')}}"
                                         :datos="$years_experiences" :modelo="$player"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-combobox-duallistbox id="province_id" :required="true" :datos="$provinces" label="{{__('balonmano.lbprov')}}" :modelo="$player"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-combobox-duallistbox id="positions" required="true"
                                                         label="{{__('balonmano.lbposicion')}}" :datos="$positions"
                                                         :multiple="true" :modelo="$player" textlocale="name"/>
                        </div>
                        <div class="form-group col-sm-12">
                            <x-content-card-tab>
                                <x-slot name="content1">
                                    <x-form-textarea id="about_player_es" :required="true" :modelo="$player" locale="es" text="about_player"
                                                     label="{{__('balonmano.lbdescripcion')}}"/>
                                </x-slot>

                                <x-slot name="content2">
                                    <x-form-textarea id="about_player_en" :required="true" :modelo="$player" locale="en" text="about_player"
                                                     label="{{__('balonmano.lbdescripcion')}}"/>
                                </x-slot>
                            </x-content-card-tab>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row mb-3">
                                <a class="btn btn-primary btn-sm" type="button"
                                   style="color: #fff" data-toggle="modal" data-target="#modal-player-title">
                                    <i class="fas fa-plus"></i> Adicionar Títulos del Jugador
                                </a>
                            </div>
                            <input type="hidden" id="player_titles_check" name="player_titles_check" value="0">
                            <div class="row">
                                <input type="hidden" id="playerstitles" name="playerstitles">
                                <input type="hidden" id="playerstitles_eliminados_BD"
                                       name="playerstitles_eliminados_BD">
                                <table id="listado_player_titles"
                                       class="table table-bordered table-hover">
                                    <thead style="text-align: center">
                                    <tr>
                                        <th hidden>No.</th>
                                        <th>Título</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            {!! $errors->first('playerstitles', '<span class="error invalid-feedback d-block" role="alert">:message</span>') !!}
                        </div>
                    </x-slot>
                </x-content-input>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
@push('page_scripts')
    <script type="text/javascript">
        let titulos = [];
        let titulos_jugadores = [];
        let titulos_eliminados_BD = []
        var cont = 0;
        var idfila = null
        let i = null;
            @foreach($titles as $title){
            i = @json($title->id );
            titulos[i] = @json($title->getTranslation('name','es') );
        }
                @endforeach

        var listadotitulosjugadores = [];
        @foreach($player_titles as $player_title)
        listadotitulosjugadores.push(@json($player_title))
        @endforeach

        $(document).ready(
            obtenerTitulosBD(),
            listarTitulos(),
        );

        //************************Metodos Auxiliares*********************
        function limpiarTitulo() {
            $("#amount").val('');
            $("#title_id").val('').trigger('change');
            $('#amount').removeClass('is-invalid');
            $('#title_id').removeClass('is-invalid');
            /*$('#error_precio').html('');
            $('#error_criterio_id').html('');*/
        }

        function obtenerTitulosBD() {
            listadotitulosjugadores.forEach(function (titu) {
                let titulo = {
                    'id': '',
                    'amount': '',
                    'name': '',
                };
                titulo.id = cont
                titulo.idbd = titu.id
                titulo.amount = titu.amount;
                titulo.name = titu.title_id;
                titulos_jugadores[cont] = titulo;
                cont++;
            })

            //Llenar en los componente de titulos de jugadores para poder obtenerlos con FormRequest en el controlador
            $("#playerstitles").val(JSON.stringify(titulos_jugadores));
        }

        function listarTitulos() {
            $('#listado_player_titles tbody').html('');

            if (titulos_jugadores.length == 0) {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.colSpan = 3;
                td.align = 'center';
                td.appendChild(document.createTextNode('No hay títulos a mostrar'));
                tr.appendChild(td);
                $('#listado_player_titles tbody').append(tr);
            }
            else {

                for (var i = 0; i <= titulos_jugadores.length - 1; i++) {
                    var titulo = $('#title_id').find('option[value=' + titulos_jugadores[i].name + ']').val();
                    let tr = document.createElement('tr');
                    tr.className = 'selected';
                    tr.id = 'fila' + titulos_jugadores[i].id;

                    let tdcont = document.createElement('td', {'hidden': true});
                    tdcont.appendChild(document.createTextNode(i));
                    tdcont.setAttribute('hidden', 'true');

                    let tdtitulo = document.createElement('td');
                    tdtitulo.id = titulo;
                    tdtitulo.className = 'text-center'
                    tdtitulo.appendChild(document.createTextNode(titulos[titulo]));

                    let tdamount = document.createElement('td');
                    tdamount.className = 'text-center'
                    tdamount.appendChild(document.createTextNode(titulos_jugadores[i].amount));

                    let tdacciones = document.createElement('td');
                    tdacciones.className = 'text-center'
                    let bteditar = document.createElement('a');
                    bteditar.innerHTML = '<a type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt" style="color: #fff"></i></a>'
                    bteditar.addEventListener('click', function () {
                        obtenerTitulos(parseInt(tr.id.substr(4)));
                    }, false)
                    let bteliminar = document.createElement('a');
                    bteliminar.innerHTML = '<a type="button" class="btn btn-danger btn-sm m-1" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash" style="color: #fff"></i></a>'
                    bteliminar.addEventListener('click', function () {
                        eliminarTitulos(parseInt(tr.id.substr(4)));
                    }, false)
                    tdacciones.appendChild(bteditar);
                    tdacciones.appendChild(bteliminar);

                    tr.appendChild(tdcont);
                    tr.appendChild(tdtitulo);
                    tr.appendChild(tdamount);
                    tr.appendChild(tdacciones);


                    $('#listado_player_titles tbody').append(tr);
                }
            }
        }

        function validateDatosTitulos() {
            var resultado = true;
            if ($('#title_id').val() == "") {
                $('#title_id').addClass('is-invalid');
                $('#error_title_id').html('');
                $('#error_title_id').append('El campo título es obligatorio');
                resultado = false;
            }
            else {
                $('#title_id').removeClass('is-invalid');
                $('#error_title_id').html('');
            }
            if ($('#amount').val() == "") {
                $('#amount').addClass('is-invalid');

                $('#error_amount').html('');
                $('#error_amount').append('El campo cantidad es obligatorio');
                resultado = false;
            }
            else {
                if (!validateEntero($('#amount').val())) {
                    $('#amount').addClass('is-invalid');
                    $('#error_amount').html('');
                    $('#error_amount').append('El campo cantidad solo admite números enteros');
                    resultado = false;
                }
                else {
                    $('#amount').removeClass('is-invalid');
                    $('#error_amount').html('');
                }
            }
            if ($('#check_repetir').val() == '0') {
                if (!validateNoRepetirTitulo()) {
                    $('#title_id').addClass('is-invalid');
                    $('#error_title_id').html('');
                    $('#error_title_id').append('El campo título ya ha sido registrado');
                    resultado = false;
                }
            }
            return resultado;
        }

        function validateEntero(valor) {
            var RE = /^[0-9]+$/;
            if (RE.test(valor))
                return true
            else
                return false
        }

        function validateNoRepetirTitulo() {
            var title_id = $('#title_id').val();
            var result = true;
            var data = getTableTitulo();
            $.each(data, function (i, item) {
                if (item['Título'] === titulos[title_id]) {
                    result = false;
                }
            });
            return result;
        }

        function getTableTitulo() {
            var array = [];
            var header = [];
            $('#listado_player_titles th').each(function (index, item) {
                header[index] = $(item).html();
            })

            $('#listado_player_titles tr').has('td').each(function () {
                var arrayItem = {};
                $('td', $(this)).each(function (index, item) {
                    arrayItem[header[index]] = $(item).html();
                    console.log(arrayItem[header[index]])
                    arrayItem['name'] = item.id;
                });
                array.push(arrayItem);
            });
            return array;
        }

        function agregarTitulo() {
            let titulo = {
                'id': '',
                'amount': '',
                'name': '',
            };
            titulo.id = cont;
            titulo.amount = $('#amount').val();
            titulo.name = $('#title_id').val();
            titulos_jugadores[cont] = titulo;
            listarTitulos();
            cont++;

            //Llenar en los componente de titulos de jugadores para poder obtenerlos con FormRequest en el controlador
            $("#playerstitles").val(JSON.stringify(titulos_jugadores));
        }

        function obtenerTitulos(val) {
            let titulo = titulos_jugadores[val];

            $('#modal-player-title').modal('show');
            $('#btn_add_titles_pago').hide();
            $('#btn_modif_titles_pago').show();
            $('#amount').val(titulo.amount);
            $('#title_id').select2('val', $('#title_id option:eq(' + titulo.name + ')').val());

            idfila = val;
            $('#check_repetir').val(1)
        }

        function modificarTitulo(val) {

            titulos_jugadores[val].amount = $('#amount').val();
            titulos_jugadores[val].name = $('#title_id').val();
            $('#modal-player-title').modal('hide');
            listarTitulos();
            $('#check_repetir').val(0)
            $("#playerstitles").val(JSON.stringify(titulos_jugadores));
        }

        function eliminarTitulos(val) {
            //Para obtener el id de los titulos de jugadores que se eliminan que vienen de BD y guardarlos
            // en un array para poderlos eliminar en en el controlador
            let titulo = titulos_jugadores[val];
            if (titulo.idbd) {
                titulos_eliminados_BD.push(titulo.idbd)
                $("#playerstitles_eliminados_BD").val(JSON.stringify(titulos_eliminados_BD));
            }

            //Procedimiento para eliminar
            titulos_jugadores = titulos_jugadores.filter(function (titulo) {
                let a = titulo.id != val
                return a;
            });
            titulos_jugadores.forEach(function (titulo, i) {
                titulo.id = i;
            })

            $("#playerstitles").val(JSON.stringify(titulos_jugadores));
            reordenar()
            listarTitulos();
        }

        //Metodo para reordenar elementos de la tabla de los titulos
        function reordenar() {
            var num = 0;
            $('#listado_player_titles tbody tr').each(function () {
                if (titulos_jugadores.length > 0) {
                    $(this).attr('id', 'fila' + num);
                    $(this).find('td').eq(0).text(num);
                }
                num++;
            });
            cont = num - 1;
        }

        function showErrors(key, value) {
            $('#' + key).addClass('is-invalid');
            $('#error_' + key).html('');
            $('#error_' + key).append(value);
        }

        //************************Seccion de Eventos*********************

        $('#modal-player-title').on('show.bs.modal', function () {
            $('#btn_modif_titles_pago').hide();
            $('#btn_add_titles_pago').show();
            limpiarTitulo()
        });

        $('#modal-player-title').on('hidden.bs.modal', function () {
            $('#check_repetir').val(0)
            limpiarTitulo()
        });

        $('#btn_add_titles_pago').on('click', function () {
            if (validateDatosTitulos()) {
                agregarTitulo()
                $('#modal-player-title').modal('hide');
            }
        });

        $('#btn_modif_titles_pago').on('click', function () {
            if (validateDatosTitulos())
                modificarTitulo(idfila)
        });

    </script>
@endpush
