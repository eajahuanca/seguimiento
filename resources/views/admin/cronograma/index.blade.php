@extends('layouts.init')

@section('FormularioTitulo','Cronograma Financiero')
@section('FormularioDescripcion','en sección se carga el Cronograma Financiero')
@section('FormularioActual','Cronograma')
@section('FormularioDetalle','Cronograma Financiero')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>PROYECTO</b></span>
                    <span>{{ $solicitud->sol_nombre }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa "><b>Bs</b></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>IMPORTES</b></span>
                    <span>Fonabosque <b>{{ ' Bs. '.number_format($solicitud->sol_montofona,2,',','.') }}</b></span><br>
                    <span>Contraparte<b>{{ ' Bs. '.number_format($solicitud->sol_montosol,2,',','.') }}</b></span><br>
                    <span>Otro Importe <b>{{ ' Bs. '.number_format($solicitud->sol_montootro,2,',','.') }}</b></span>                  
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>TIEMPO</b></span>
                    <span>{{ $solicitud->sol_tiempo.' Meses' }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos</h3>
                </div>
                <div class="box-body">
                    @include('admin.cronograma.form')
                </div>
            </div>
        </div>
    </div>   
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Cronograma Financiero Programado</h3>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped" style="font-size:11px !important;text-align:center !important;">
                        <thead>
                            <tr class="btn-success">
                                <th style="text-align:center; vertical-align: middle;">MES</th>
                                <th style="text-align:center; vertical-align: middle;">CORRESPONDE</th>
                                <th style="text-align:center; vertical-align: middle;">DESEMBOLSO</th>
                                <th style="text-align:center; vertical-align: middle;">FECHA DESEMBOLSO</th>
                                <th style="text-align:center; vertical-align: middle;">PROGRAMADO</th>
                                <th style="text-align:center; vertical-align: middle;">EJECUTADO</th>
                                <th style="text-align:center; vertical-align: middle;">TOTAL EJECUTADO</th>
                                <th style="text-align:center; vertical-align: middle;">%</th>
                                <th style="text-align:center; vertical-align: middle;">SALDO</th>
                                <th style="text-align:center; vertical-align: middle;">%</th>
                                <th style="text-align:center; vertical-align: middle;">SALDO ANTERIOR</th>
                                <th style="text-align:center; vertical-align: middle;">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cronograma as $item)
                            <tr>
                                <td style="text-align:center; vertical-align: middle;">{{ $item->cro_mes }}</td>
                                <td style="text-align:left; vertical-align: middle;">{{ $item->cro_mes_correspondiente }}</td>
                                <td style="text-align:right; vertical-align: middle;">
                                    @if($item->cro_desembolso != '0.00')
                                    <div style="background:orange;color:#F0F5F2;font-weight:bold;padding-top:3px;padding-bottom:3px;padding-left:2px;padding-right:3px;">{{ 'Bs. '.$item->cro_desembolso }}</div>
                                    @else
                                    {{ 'Bs. '.$item->cro_desembolso }}
                                    @endif
                                </td>
                                <td style="text-align:center; vertical-align: middle;">{{ $item->cro_fecha_desembolso }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ 'Bs. '.number_format($item->cro_programado,2,',','.') }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ 'Bs. '.number_format($item->cro_ejecutado,2,',','.') }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ 'Bs. '.number_format($item->cro_total_ejecutado,2,',','.') }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ number_format($item->cro_total_ejecutado_por,2,',','.').'%' }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ 'Bs. '.number_format($item->cro_saldo,2,',','.') }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ number_format($item->cro_saldo_por,2,',','.').'%' }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ 'Bs. '.number_format($item->cro_saldo_anterior,2,',','.') }}</td>
                                <td style="text-align:right; vertical-align: middle;">{{ number_format($item->cro_saldo_anterior_por,2,',','.').'%' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('plugins/lte/datatables/responsive/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable();

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
