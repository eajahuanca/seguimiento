@extends('layouts.init')

@section('FormularioTitulo','Documentación previa')
@section('FormularioDescripcion','en sección se carga la documentación PREVIA AL PRIMER DESEMBOLSO')
@section('FormularioActual','Documentos')
@section('FormularioDetalle','Cargar Documentos')

@section('stylesheet')
@endsection

@section('ContenidoPagina')

    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>PROYECTO</b></span>
                    <span>{{ $solicitud->sol_nombre }}</span>
                </div>
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de documentos a cargar</h3>
                </div>
                <div class="box-body">
                    <?php $cont=1;$doc1=$doc2=$doc3=$doc4=$doc5=$doc6=$doc7=$doc8=$doc9=$doc10=$doc11=$doc12=$doc13=$doc14=$doc15=$doc16=false; ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20px">#</th>
                                <th>Descripción del Archivo a Cargar</th>
                                <th width="30px">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>Informe Técnico de Condiciones Previas - ITCP Aprobado por la MAE de la Entidad Proponente</td>
                                <td>
                                    @foreach($documento as $item1)
                                        @if($item1->doc_tipo == "ITCP-MAE")
                                            <?php $doc1=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc1==true)
                                        <a href="{{ asset($item1->doc_archivo) }}" title="{{ $item1->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(0)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>Informe Técnico de aprobación del ITCP, emitido por el FONABOSQUE</td>
                                <td>
                                    @foreach($documento as $item2)
                                        @if($item2->doc_tipo == "ITCP-FONABOSQUE")
                                            <?php $doc2=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc2==true)
                                        <a href="{{ asset($item2->doc_archivo) }}" title="{{ $item2->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(1)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>Estudio de Diseño Técnico de Preinversión - EDTP, presente por la Entidad Proponente.</td>
                                <td>
                                    @foreach($documento as $item3)
                                        @if($item3->doc_tipo == "EDTP-EJECUTOR")
                                            <?php $doc3=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc3==true)
                                        <a href="{{ asset($item3->doc_archivo) }}" title="{{ $item3->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(2)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>Informe Técnico sobre la Consistencia del EDTP y comunicación de la aprobación de la MAE del FONABOSQUE</td>
                                <td>
                                    @foreach($documento as $item4)
                                        @if($item4->doc_tipo == "EDTP-MAE")
                                            <?php $doc4=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc4==true)
                                        <a href="{{ asset($item4->doc_archivo) }}" title="{{ $item4->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(3)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>Dictamen de registro del Proyecto en el SISIN WEB</td>
                                <td>
                                    @foreach($documento as $item5)
                                        @if($item5->doc_tipo == "SISIN-WEB")
                                            <?php $doc5=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc5==true)
                                        <a href="{{ asset($item5->doc_archivo) }}" title="{{ $item5->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(4)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>Documento que acredite la inscripción Registro del Programa o Proyecto en el VIPFE</td>
                                <td>
                                    @foreach($documento as $item6)
                                        @if($item6->doc_tipo == "VIPFE")
                                            <?php $doc6=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc6==true)
                                        <a href="{{ asset($item6->doc_archivo) }}" title="{{ $item6->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(5)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 7</td>
                                <td>
                                    @foreach($documento as $item7)
                                        @if($item7->doc_tipo == "SIGEP")
                                            <?php $doc7=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc7==true)
                                        <a href="{{ asset($item7->doc_archivo) }}" title="{{ $item7->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(6)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 8</td>
                                <td>
                                    @foreach($documento as $item8)
                                        @if($item8->doc_tipo == "LICENCIA-AMBIENTAL")
                                            <?php $doc8=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc8==true)
                                        <a href="{{ asset($item8->doc_archivo) }}" title="{{ $item8->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(7)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 9</td>
                                <td>
                                    @foreach($documento as $item9)
                                        @if($item9->doc_tipo == "ABT")
                                            <?php $doc9=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc9==true)
                                        <a href="{{ asset($item9->doc_archivo) }}" title="{{ $item9->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(8)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 10</td>
                                <td>
                                    @foreach($documento as $item10)
                                        @if($item10->doc_tipo == "APERTURA-LIBRETA")
                                            <?php $doc10=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc10==true)
                                        <a href="{{ asset($item10->doc_archivo) }}" title="{{ $item10->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(9)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 11</td>
                                <td>
                                    @foreach($documento as $item11)
                                        @if($item11->doc_tipo == "COORDINADOR-PROYECTOR")
                                            <?php $doc11=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc11==true)
                                        <a href="{{ asset($item11->doc_archivo) }}" title="{{ $item11->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(10)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 12</td>
                                <td>
                                    @foreach($documento as $item12)
                                        @if($item12->doc_tipo == "INFORMES-TECNICOS-FONABOSQUE")
                                            <?php $doc12=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc12==true)
                                        <a href="{{ asset($item12->doc_archivo) }}" title="{{ $item12->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(11)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 13</td>
                                <td>
                                    @foreach($documento as $item13)
                                        @if($item13->doc_tipo == "REGLAMENTO-OPERATIVO")
                                            <?php $doc13=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc13==true)
                                        <a href="{{ asset($item13->doc_archivo) }}" title="{{ $item13->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(12)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 14</td>
                                <td>
                                    @foreach($documento as $item14)
                                        @if($item14->doc_tipo == "VERIFICACION-CONDICIONES-PREVIAS")
                                            <?php $doc14=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc14==true)
                                        <a href="{{ asset($item14->doc_archivo) }}" title="{{ $item14->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(13)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 15</td>
                                <td>
                                    @foreach($documento as $item15)
                                        @if($item15->doc_tipo == "SOLICITUD-TRANSFERENCIA-BDP")
                                            <?php $doc15=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc15==true)
                                        <a href="{{ asset($item15->doc_archivo) }}" title="{{ $item15->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(14)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $cont++ }}</td>
                                <td>doc 16</td>
                                <td>
                                    @foreach($documento as $item16)
                                        @if($item16->doc_tipo == "INFORME-CPYEP")
                                            <?php $doc16=true;break;?>
                                        @endif
                                    @endforeach
                                    @if($doc16==true)
                                        <a href="{{ asset($item16->doc_archivo) }}" title="{{ $item16->doc_nombre }}" target="_blank"><img src="{{ asset('plugins/login/img/pdf.png') }}" with="37px" height="40px"/></a>
                                    @else
                                        <span class="hint--top  hint--info" aria-label="Cargar Documento"><a href="{{ url('formdoc',['idsolicitud' => encrypt($solicitud->id), 'position' => encrypt(15)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::get('estado')=="1")
                toastr["success"]("{{ Session::get('msg') }}","{{ Session::get('title') }}");
            @endif
            @if(Session::get('estado')=="2")
                toastr["error"]("{{ Session::get('msg') }}", "{{ Session::get('title') }}");
            @endif
            {{ Session::forget('estado') }}
            {{ Session::forget('title') }}
            {{ Session::forget('msg') }}
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
    </script>
@endsection
