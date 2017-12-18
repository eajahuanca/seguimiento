<!DOCTYPE html>
<html>
    <title>Formulario de Seguimiento 2</title>
    <head>
		<style type="text/css">
			body{
                font-family: Arial, Helvetica, sans-serif;
            }
            table.tableizer-table {
                font-size: 12px;
                border: 1px solid #000000;
            }
            .tableizer-table td {
                padding: 4px;
                margin: 3px;
                border: 1px solid #000000;
            }
            .tableizer-table th {
                background-color: #104E8B;
                color: #FFF;
            }
            .tableBorder{
                border: 1px solid #000000;
                border-collapse: collapse;
            }
            .tableEspaciosTitulo{
                margin-bottom:2em;
                margin-top:-1em;
            }
            .tableEspacios{
                margin-bottom:2em;
                margin-top:-2em;
            }
            .nota, .impresion{
                font-style:italic;
                font-size:10px;
            }
            .observaciones{
                font-style:italic;
                font-size:11px;
            }
		</style>
	</head>
<body>
	<table width="100%">
        <tr>
            <td align="left" width="50%"><img src="{{ asset('plugins/login/img/bolivia.jpg') }}" width="95px" height="80px"/></td>
            <td align="right" width="50%"><img src="{{ asset('plugins/login/img/logo.jpg') }}" width="200px" height="50px"/></td>
        </tr>
    </table>

    <div class="tableEspaciosTitulo">
        <center><h3>Planilla de Reporte Mensual Componente 2</h3></center>
    </div>
    <div class="tableEspacios">
    <b>Componente 2:</b> {!! $componente->esp_objetivo !!}
    </div>
        <?php $contador = 1; $totalPersonas = $totalProgramado = $totalAvance = $totalPorcentaje = 0; $observaciones = ''; ?>
		<table class="tableizer-table tableBorder">
			<thead>
				<tr>
					<th colspan="2" style="padding:7px"><b>No DE COMPONENTE :</b></th>
					<th colspan="3" style="padding:7px">2 (xxx)</th>
					<th style="padding:7px"><b>INDICADOR:</b></th>
					<th colspan="3" align="justify" style="padding:7px">{!! $componente->esp_componente !!}</th>
				</tr>
			</thead>
		<tbody>

		 		<tr>
		 			<td rowspan="3" align="center" height="75px"><b>No</b></td>
		 			<td rowspan="3" align="center" height="75px"><b>Población <br>meta</b></td>
		 			<td colspan="3" rowspan="2" align="center"><b>PROGRAMADO</b></td>
		 			<td colspan="3" align="center"><b>PROGRAMADO MENSUAL / AVANCE (No participantes)</b></td>
		 			<td rowspan="3" align="center"><b>AVANCE (%)</b></td>
		 		</tr>
		 		<tr>
		 			<td colspan="2" align="center"><b>{{ $mes->form_mes }} </b></td>
		 			<td rowspan="2" align="center"><b>AVANCE ACUMULADO<br>(No participantes)</b></td>
		 		</tr>
		 		<tr>
		 			<td align="center"><b>Temática</b></td>
		 			<td align="center"><b>No de personas</b></td>
		 			<td align="center"><b>Material de apoyo</b></td>
		 			<td align="center"><b>PG</b></td>
		 			<td align="center"><b>AV</b></td>
		 		</tr>
                @foreach($actividad as $item)
		 		<tr>
		 			<td>{{ $contador++ }}</td>
		 			<td>{{ $item['form_poblacion']}}</td>
		 			<td>{{ $item['form_tematica'] }}</td>
		 			<td align="center">{{ $item['form_personas']}}</td>
		 			<td>{{ $item['form_apoyo'] }}</td>
		 			<td align="center">{{ number_format($item['form_programado'],2,',','.') }}</td>
		 			<td align="center">{{ number_format($item['form_avance'],2,',','.') }}</td>
		 			<td align="center">{{ number_format(0,2,',','.') }}</td>
		 			<td align="right">{{ number_format($item['form_pavance'],2,',','.').'%' }}</td>
		 		</tr>
                 <?php
                    $totalPersonas = $totalPersonas + $item['form_personas']; 
                    $totalProgramado = $totalProgramado + $item['form_programado'];
                    $totalAvance = $totalAvance + $item['form_avance'];
                    $totalPorcentaje = $totalPorcentaje + $item['form_pavance'];
                    $observaciones .= $item['form_obs'].', ';
                 ?>
                @endforeach
		 		<tr>
		 			<td colspan="2" align="center"><b>TOTALES</b></td>
		 			<td>&nbsp;</td>
		 			<td align="center"><b>{{ $totalPersonas }}</b></td>
		 			<td>&nbsp;</td>
		 			<td align="center"><b>{{ number_format($totalProgramado,2,',','.') }}</b></td>
		 			<td align="center"><b>{{ number_format($totalAvance,2,',','.') }}</b></td>
		 			<td align="center"><b>{{ number_format(0,2,',','.') }}</b></td>
		 			<td align="right"><b>{{ number_format($totalPorcentaje,2,',','.').'%' }}</b></td>
		 		</tr>
			</tbody>
		</table><br>
	<div class="nota">PG: Programado, AV: Avance</div><br>
    <div class="tableEspacios">Observaciones :
        <p class="observaciones">{{ $observaciones }}</p>
    </div>
	{!! DNS2D::getBarcodeHTML(date('dmYHis')."1"."|Nombre del Proyecto|Monto", "QRCODE",4,4) !!}
	<footer>
        <div class='impresion'>
            <p>{{ $fechaImpresion }}</p>
        </div>
    </footer>
</body>
</html>
