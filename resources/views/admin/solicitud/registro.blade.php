@extends('layouts.init')

@section('FormularioTitulo','Formulario de Solicitud')
@section('FormularioDescripcion','en este formulario se debe ingresar los datos de la solicitud')
@section('FormularioActual','Solicitud')
@section('FormularioDetalle','Solicitud')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')

    {!! Form::open(['id' => 'formSolicitud', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('admin.solicitud.formCreate')
        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos de la solicitud"><button type="buttom" class="btn btn-success" id='GrabarProyecto'><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--success" aria-label="Guardar los datos y Solicitar Aprobación"><button type="buttom" class="btn btn-success" id='GrabarProyectoA'><i class="fa fa-save"></i> Guardar y Solicitar Aprobación</button></span>
            </center>
        </div>
    {!! Form::close() !!}
    
@endsection

@section('javascript')
    <script src="{{ asset('plugins/lte/datatables/responsive/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/lte/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#example tr").click(function(){
                var hruta = $(this).find('td');
                $("#modalSigec").modal('toggle');
                $("#sol_hrsigec").val($(hruta[0]).html());
            });

            $("#example tr").mouseenter(function(){
                $(this).css('background-color','#27AE60');
                $(this).css('color','white');
            });

            $("#example tr").mouseleave(function(){
                $(this).css('background-color','#F4F4F4');
                $(this).css('color','#333');
            });
        });
    </script>
    @include('admin.solicitud.modal')

    <!--Cargar Datos -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("select[name=idprovincia]").empty();
            $("select[name=idprovincia]").append("<option value='' disabled selected style='display:none;'>Seleccione Provincia</option>");
            $("#sol_municipio").empty();
            $("#sol_municipio").append("<option value='' disabled selected style='display:none;'></option>");
            
            //Entidad y Sigla
            $("select[name=identidad]").change(function(){
                var entidadID = $("select[name=identidad]").val();
                $.ajax({
                    url: "{{ url('/getSigla', '"+ entidadID +"') }}",
                    type: "get",
                    datatype: "json",
                    data: {"entidadID" : entidadID},
                    success: function(rpta){
                        $.each(rpta, function(index, value){
                            $("#sol_sigla").val(value['ent_sigla']);
                        });
                    }
                });
            });

            //Provincia
            $("select[name=iddepto]").change(function(){
                var departamentoID = $("select[name=iddepto]").val();
                $.ajax({
                    url: "{{ url('/getProvincia', '"+ departamentoID +"') }}",
                    type: "get",
                    datatype: "json",
                    data: {"departamentoID" : departamentoID},
                    success: function(rpta){
                        $("select[name=idprovincia]").empty();
                        $("select[name=idprovincia]").append("<option value='' disabled selected style='display:none;'>Seleccione Provincia</option>");
                        $.each(rpta, function(index, value){
                            $("select[name=idprovincia]").append("<option value='" + value['id'] + "'>" + value['pro_nombre'] + "</option>");
                        });
                    }
                });
            });
            
            //Municipio
            $("select[name=idprovincia]").change(function(){
                var provinciaID = $("select[name=idprovincia]").val();
                $.ajax({
                    url: "{{ url('/getMunicipio', '"+ provinciaID +"') }}",
                    type: "get",
                    datatype: "json",
                    data: {"provinciaID" : provinciaID},
                    success: function(rpta){
                        $("select[id=sol_municipio]").empty();
                        $.each(rpta, function(index, value){
                            $("select[id=sol_municipio]").append("<option value='" + value['mun_nombre'] + "'>" + value['mun_nombre'] + "</option>");
                        });
                    }
                });
            });
        });
    </script>

    <!--Validacion y Envio de Datos-->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#GrabarProyecto").click(function(event){
                event.preventDefault();
                //var dataString = $("#formProyectos").serialize();
                var dataString = new FormData(document.getElementById("formSolicitud"));// $("#formProyectos").serialize();
                var token = $("input[name=_token]").val();
                var route = "{{ route('solicitud.store')}}";
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN':token},
                    type: 'post',
                    datatype: 'json',
                    data: dataString,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        if(data.success == 'true')
                        {
                            location.reload();
                            //lanzar mensaje de correcto
                        }
                        else
                        {
                            //var msg = data.success;
                            toastr["error"](data.success, "Error en Registro");
                        }
                    },
                    error:function(data){
                        toastr["error"]("Existen campos del formulario que no cumplen las condiciones.", "Error en el Formulario");
                        if(data.responseJSON.sol_hrsigec)
                        { $("#error1").html(data.responseJSON.sol_hrsigec); }
                        else
                        { $("#error1").html(""); }
                        $("#msg-error1").fadeIn();

                        if(data.responseJSON.sol_nombre)
                        { $("#error4").html(data.responseJSON.sol_nombre); }
                        else
                        { $("#error4").html(""); }
                        $("#msg-error4").fadeIn();

                        if(data.responseJSON.sol_objetivo)
                        { $("#error4").html(data.responseJSON.sol_objetivo); }
                        else
                        { $("#error4").html(""); }
                        $("#msg-error4").fadeIn();

                        if(data.responseJSON.sol_justicacion)
                        { $("#error4").html(data.responseJSON.sol_justicacion); }
                        else
                        { $("#error4").html(""); }
                        $("#msg-error4").fadeIn();

                        if(data.responseJSON.identidad)
                        { $("#error2").html(data.responseJSON.identidad); }
                        else
                        { $("#error2").html(""); }
                        $("#msg-error2").fadeIn();

                        if(data.responseJSON.sol_sigla)
                        { $("#error4").html(data.responseJSON.sol_sigla); }
                        else
                        { $("#error4").html(""); }
                        $("#msg-error4").fadeIn();

                        if(data.responseJSON.idprovincia)
                        { $("#error6").html(data.responseJSON.idprovincia); }
                        else
                        { $("#error6").html(""); }
                        $("#msg-error6").fadeIn();

                        if(data.responseJSON.sol_municipio)
                        { $("#error7").html(data.responseJSON.sol_municipio); }
                        else
                        { $("#error7").html(""); }
                        $("#msg-error7").fadeIn();

                        if(data.responseJSON.sol_montofona)
                        { $("#error8").html(data.responseJSON.sol_montofona); }
                        else
                        { $("#error8").html(""); }
                        $("#msg-error8").fadeIn();

                        if(data.responseJSON.sol_montosol)
                        { $("#error8").html(data.responseJSON.sol_montosol); }
                        else
                        { $("#error8").html(""); }
                        $("#msg-error8").fadeIn();

                        if(data.responseJSON.sol_montootro)
                        { $("#error8").html(data.responseJSON.sol_montootro); }
                        else
                        { $("#error8").html(""); }
                        $("#msg-error8").fadeIn();

                        if(data.responseJSON.sol_tiempo)
                        { $("#error9").html(data.responseJSON.sol_tiempo); }
                        else
                        { $("#error9").html(""); }
                        $("#msg-error9").fadeIn();

                        if(data.responseJSON.sol_respaldo)
                        { $("#error10").html(data.responseJSON.sol_respaldo); }
                        else
                        { $("#error10").html(""); }
                        $("#msg-error10").fadeIn();

                        if(data.responseJSON.sol_ftecnica)
                        { $("#error10").html(data.responseJSON.sol_ftecnica); }
                        else
                        { $("#error10").html(""); }
                        $("#msg-error10").fadeIn();

                        if(data.responseJSON.sol_componente)
                        { $("#error10").html(data.responseJSON.sol_componente); }
                        else
                        { $("#error10").html(""); }
                        $("#msg-error10").fadeIn();
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::get('active'))
                toastr["success"]("Registro de Proyecto a Evaluar", "Se realizo el registro de manera satisfactoria.");
                {{ Session::forget('active') }}
            @endif
        });
    </script>
@endsection
