@extends('layouts.init')

@section('FormularioTitulo','Proyectos a Evaluar')
@section('FormularioDescripcion','en este formulario se pueden observar todos los proyectos a evaluar')
@section('FormularioActual','Proyectos a evaluar')
@section('FormularioDetalle','Proyectos')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')

    {!! Form::open(['id' => 'formProyectos', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('admin.solicitud.formCreate')
        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos de la solicitud"><button type="buttom" class="btn btn-success" id='GrabarProyecto'><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar la solicitud"><a href="{{ route('solicitud.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
                <span class="hint--top  hint--info" aria-label="Listar Solicitudes"><a href="{{ route('solicitud.index') }}" class="btn btn-primary"><i class="fa fa-list"></i> Listar Solicitudes</a></span>
            </center>
        </div>
    {!! Form::close() !!}
    <hr class="btn-primary">
    
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
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#example tr").click(function(){
                var hruta = $(this).find('td');
                $("#modalSigec").hide();
                $("#proy_hrsigec").val($(hruta[0]).html());
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
    @include('admin.solicitud.modal');


    <!--Cargar Datos -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("select[name=unidad_id]").empty();
            $("select[name=unidad_id]").append("<option value='' disabled selected style='display:none;'>Seleccione Proponente</option>");
            $("select[name=provincia_id]").empty();
            $("select[name=provincia_id]").append("<option value='' disabled selected style='display:none;'>Seleccione Provincia</option>");
            $("#municipio_id").empty();
            $("#municipio_id").append("<option value='' disabled selected style='display:none;'>Seleccione Municipio</option>");
            //Entidades
            $.ajax({
                url: "{{ url('/getEntidad') }}",
                type: "get",
                datatype: "json",
                success: function(rpta){
                    $("select[name=entidad_id]").empty();
                    $("select[name=entidad_id]").append("<option value='' disabled selected style='display:none;'>Seleccione Entidad</option>");
                    $.each(rpta, function(index, value){
                        $("select[name=entidad_id]").append("<option value='" + value['id'] + "'>" + value['ent_nombre'] + "</option>");
                    });
                }
            });
            //Departamentos
            $.ajax({
                url: "{{ url('/getDepartamento') }}",
                type: "get",
                datatype: "json",
                success: function(rpta){
                    $("select[name=departamento_id]").empty();
                    $("select[name=departamento_id]").append("<option value='' disabled selected style='display:none;'>Seleccione Departamento</option>");
                    $.each(rpta, function(index, value){
                        $("select[name=departamento_id]").append("<option value='" + value['id'] + "'>" + value['dep_nombre'] + "</option>");
                    });
                }
            });
            //Unidad Proponente
            $("select[name=entidad_id]").change(function(){
                var entidadID = $("select[name=entidad_id]").val();
                $.ajax({
                    url: "{{ url('/getUnidad', '"+ entidadID +"') }}",
                    type: "get",
                    datatype: "json",
                    data: {"entidadID" : entidadID},
                    success: function(rpta){
                        $("select[name=unidad_id]").empty();
                        $("select[name=unidad_id]").append("<option value='' disabled selected style='display:none;'>Seleccione Proponente</option>");
                        $.each(rpta, function(index, value){
                            $("select[name=unidad_id]").append("<option value='" + value['id'] + "'>" + value['uni_nombre'] + "</option>");
                            $("#proy_sigla").val(value['ent_sigla']);
                        });
                    }
                });
            });
            //Provincia
            $("select[name=departamento_id]").change(function(){
                var departamentoID = $("select[name=departamento_id]").val();
                $.ajax({
                    url: "{{ url('/getProvincia', '"+ departamentoID +"') }}",
                    type: "get",
                    datatype: "json",
                    data: {"departamentoID" : departamentoID},
                    success: function(rpta){
                        $("select[name=provincia_id]").empty();
                        $("select[name=provincia_id]").append("<option value='' disabled selected style='display:none;'>Seleccione Provincia</option>");
                        $.each(rpta, function(index, value){
                            $("select[name=provincia_id]").append("<option value='" + value['id'] + "'>" + value['prov_nombre'] + "</option>");
                        });
                    }
                });
            });
            //Municipio
            $("select[name=provincia_id]").change(function(){
                var provinciaID = $("select[name=provincia_id]").val();
                $.ajax({
                    url: "{{ url('/getMunicipio', '"+ provinciaID +"') }}",
                    type: "get",
                    datatype: "json",
                    data: {"provinciaID" : provinciaID},
                    success: function(rpta){
                        $("select[id=municipio_id]").empty();
                        $("select[id=municipio_id]").append("<option value='' disabled selected style='display:none;'>Seleccione Municipio</option>");

                        $.each(rpta, function(index, value){
                            $("select[id=municipio_id]").append("<option value='" + value['mun_nombre'] + "'>" + value['mun_nombre'] + "</option>");
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
                var dataString = new FormData(document.getElementById("formProyectos"));// $("#formProyectos").serialize();
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
                        }
                        else
                        {
                            //var msg = data.success;
                            toastr["error"](data.success, "Error en Registro");
                        }
                    },
                    error:function(data){
                        toastr["error"]("Existen campos del formulario que no cumplen las condiciones.", "Error en el Formulario");
                        if(data.responseJSON.proy_hr)
                        { $("#error1").html(data.responseJSON.proy_hr); }
                        else
                        { $("#error1").html(""); }
                        $("#msg-error1").fadeIn();

                        if(data.responseJSON.entidad_id)
                        { $("#error2").html(data.responseJSON.entidad_id); }
                        else
                        { $("#error2").html(""); }
                        $("#msg-error2").fadeIn();

                        if(data.responseJSON.unidad_id)
                        { $("#error3").html(data.responseJSON.unidad_id); }
                        else
                        { $("#error3").html(""); }
                        $("#msg-error3").fadeIn();

                        if(data.responseJSON.proy_sigla)
                        { $("#error4").html(data.responseJSON.proy_sigla); }
                        else
                        { $("#error4").html(""); }
                        $("#msg-error4").fadeIn();

                        if(data.responseJSON.departamento_id)
                        { $("#error5").html(data.responseJSON.departamento_id); }
                        else
                        { $("#error5").html(""); }
                        $("#msg-error5").fadeIn();

                        if(data.responseJSON.provincia_id)
                        { $("#error6").html(data.responseJSON.provincia_id); }
                        else
                        { $("#error6").html(""); }
                        $("#msg-error6").fadeIn();

                        if(data.responseJSON.municipio_id)
                        { $("#error7").html(data.responseJSON.municipio_id); }
                        else
                        { $("#error7").html(""); }
                        $("#msg-error7").fadeIn();

                        if(data.responseJSON.proy_monto)
                        { $("#error8").html(data.responseJSON.proy_monto); }
                        else
                        { $("#error8").html(""); }
                        $("#msg-error8").fadeIn();

                        if(data.responseJSON.proy_tiempo)
                        { $("#error9").html(data.responseJSON.proy_tiempo); }
                        else
                        { $("#error9").html(""); }
                        $("#msg-error9").fadeIn();

                        if(data.responseJSON.proy_archivo)
                        { $("#error10").html(data.responseJSON.proy_archivo); }
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
