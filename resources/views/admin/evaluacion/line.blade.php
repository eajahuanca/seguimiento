@extends('layouts.init')

@section('FormularioTitulo','Solicitud')
@section('FormularioDescripcion','en esta sección se puede observar el detalle de la solicitud')
@section('FormularioActual','Solicitud Detalle')
@section('FormularioDetalle','Solicitud')

@section('stylesheet')
@endsection

@section('ContenidoPagina')
    @include('admin.fechaHoras')
    <div class="row">
        <div class="col-md-12">
            <ul class="timeline">
                <!--DATOS DEL PROYECTO-->
                <li class="time-label">
                    <span class="bg-orange">
                        {{ fecha($solicitud->created_at) }}
                    </span>
                </li>
                <li>
                    <i class="fa fa-bars bg-orange"></i>
                    <div class="timeline-item">
                        <div class="col-md-12">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Solicitud</h3>
                                    <div class="box-tools pull-right">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ hora($solicitud->created_at) }}</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            Código del Proyecto : 
                                            {!! Form::label('sol_codigo',$solicitud->sol_codigo) !!}
                                        </div>
                                        <div class="col-md-2">
                                            Hoja de Ruta SIGEC : 
                                            {!! Form::label('sol_hrsigec',$solicitud->sol_hrsigec) !!}
                                        </div>
                                        <div class="col-md-2">
                                            Tipo de Proyecto : 
                                            {!! Form::label('sol_tipo',$solicitud->sol_tipo) !!}
                                        </div>
                                        <div class="col-md-4">
                                            Entidad (UE) : 
                                            {!! Form::label('identidad',$solicitud->entidad->ent_nombre) !!}
                                        </div>
                                        <div class="col-md-2">
                                            Sigla de la Entidad :
                                            {!! Form::label('sol_sigla',$solicitud->sol_sigla) !!}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            Departamento :
                                            {!! Form::label('sol_depto',strtoupper($solicitud->departamento->dep_descripcion)) !!}
                                        </div>
                                        <div class="col-md-2">
                                            Provincia :<br>
                                            {!! Form::label('sol_provincia',strtoupper($solicitud->provincia->pro_nombre)) !!}
                                        </div>
                                        <div class="col-md-2">
                                            Municipio(s) :
                                            {!! Form::label('sol_municipio',strtoupper($solicitud->sol_municipio)) !!}
                                        </div>
                                        <div class="col-md-3">
                                            Responsable del Proyecto :
                                            {!! Form::label('sol_responsable',$solicitud->responsable->us_nombre.' '.$solicitud->responsable->us_paterno.' '.$solicitud->responsable->us_materno) !!}
                                        </div>
                                        <div class="col-md-3">
                                            Componentes del Proyecto :
                                            {!! Form::label('sol_componente',$solicitud->sol_componente) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <i class="fa fa-hourglass-half bg-green"></i>
                    <div class="timeline-item">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Proyecto : {!! Form::label('sol_nombre',$solicitud->sol_nombre) !!}</h3>
                                    <div class="box-tools pull-right">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ hora($solicitud->created_at) }}</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-yellow"><i class="fa fa-balance-scale"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-number">OBJETIVO</span>
                                                    {{ $solicitud->sol_objetivo }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-red"><i class="fa fa-hourglass-half"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-number">JUSTIFICACION</span>
                                                    {{ $solicitud->sol_justicacion }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                
                <li>
                    <i class="fa bg-blue"><b>Bs</b></i>
                    <div class="timeline-item">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Importes y Tiempo</h3>
                                    <div class="box-tools pull-right">
                                        <span class="time"><i class="fa fa-clock-o"></i> Tiempo del Proyecto {{ $solicitud->sol_tiempo.' Años' }}</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-aqua"><i class="fa"><b>Bs</b></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">FONABOSQUE</span>
                                                    <span class="info-box-number">{{ $solicitud->sol_montofona }}</span>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-aqua"><i class="fa"><b>Bs</b></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">CONTRAPARTE</span>
                                                    <span class="info-box-number">{{ $solicitud->sol_montosol }}</span>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-aqua"><i class="fa"><b>Bs</b></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">OTRO</span>
                                                    <span class="info-box-number">{{ $solicitud->sol_montootro }}</span>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">TIEMPO DEL PROYECTO</span>
                                                    <span class="info-box-number">{{ $solicitud->sol_tiempo.' Años' }}</span>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <i class="fa fa-file-pdf-o bg-red"></i>
                    <div class="timeline-item">
                        <div class="col-md-12">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Documentos Base del Proyecto</h3>
                                    <div class="box-tools pull-right">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ hora($solicitud->created_at) }}</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                            <a href="{{ asset($solicitud->reglamento->reg_archivo) }}" target="_blank">
                                                <img class="margin" src="{{ asset('plugins/login/img/pdf.png') }}" width="90px" height="100px"/>
                                                <h4>{{ $solicitud->reglamento->reg_nombre }}</h4>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                            <a href="{{ asset($solicitud->sol_respaldo) }}" target="_blank">
                                                <img class="margin" src="{{ asset('plugins/login/img/pdf.png') }}" width="90px" height="100px"/>
                                                <h4>Respaldo</h4>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                            <a href="{{ asset($solicitud->sol_ftecnica) }}" target="_blank">
                                                <img class="margin" src="{{ asset('plugins/login/img/pdf.png') }}" width="90px" height="100px"/>
                                                <h4>Ficha Técnica</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--FIN DATOS DEL PROYECTO-->
                <!--NUEVOS ARCHIVOS PDF-->
                <li class="time-label">
                    <span class="bg-green">
                        {{ fecha(date('Y-m-d')) }}
                    </span>
                </li>
                <li>
                    <i class="fa fa-file-pdf-o bg-red"></i>
                    <div class="timeline-item">
                        <div class="col-md-12">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Documentos del Proceso de Aprobación del Proyecto</h3>
                                    <div class="box-tools pull-right">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ 'Hora '.date('H:i:s') }}</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        @if(count($archivo)>0)
                                        @foreach($archivo as $itemAr)
                                            @if($itemAr->ar_archivo!='' && $itemAr->ar_revisado != '-')
                                            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                                <a href="{{ asset($itemAr->ar_archivo) }}" target="_blank">
                                                    <img class="margin" src="{{ asset('plugins/login/img/pdf.png') }}" width="90px" height="100px"/>
                                                    <h4>{{ $itemAr->ar_revisado }}</h4>
                                                </a>
                                            </div>
                                            @endif
                                        @endforeach
                                        @else
                                            <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                                                <h4><b>EL PROYECTO AUN NO CUENTA CON ARCHIVOS.</b></h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--FIN NUEVOS ARCHIVOS PDF-->
                <li>
                    <span class="hint--top  hint--info" aria-label="Cargar Archivo Correspondiente"><a id="btnEnviar" class="btn btn-primary"><i class="fa fa-plus"></i><b> Cargar Archivo</b></a></span>
                </li>
                <li>
                    <span class="hint--top  hint--error" aria-label="Regresar a la página anterior"><a id="btnRegresar" class="btn btn-danger"><i class="fa fa-reply"></i><b> Regresar</b></a></span>
                </li>
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>
    </div>
    
@endsection

@section('javascript')
    <script>
        $('#btnEnviar').click(function(){
            window.location.href="{{ route('evaluacion.edit', encrypt($solicitud->id)) }}";
        });
        $('#btnRegresar').click(function(){
            history.back();
        });
    </script>
@endsection