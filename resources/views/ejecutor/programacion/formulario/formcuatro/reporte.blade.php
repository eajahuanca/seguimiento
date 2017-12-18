
<!DOCTYPE html>
<html>
    <title>Formulario de Seguimiento</title>
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
        	<center><h3>Planilla de Reporte Mensual Componente 4</h3></center>
   		</div>
    	<div class="tableEspacios">
    		<b>Componente 4:</b> {!! $componente->esp_objetivo !!}
    	</div>
        <?php $contador = 1; $totalEspecie = $totalArea = $totalPlantin = $totalProgramado = $totalProgramado2 = $totalAvance = $totalAvance2 = $totalPorcentaje = $totalPorcentaje2 = 0; $observaciones = ''; ?>
		<table class="tableizer-table tableBorder">
			<thead>
				<tr>
				<th colspan="2" style="padding:7px"><b>Nº DE COMPONENTE:</b></th>
				<th colspan="3" style="padding:7px">4 (xxx)</th>
				<th colspan="4" style="padding:7px"><b>INDICADOR:</b></th>
				<th colspan="4" style="padding:5px">{!! $componente->esp_componente !!}</th>
			</tr>
		</thead>
		<tbody>
		 		<tr>
		 			<td rowspan="3" align="center" height="75px"><b>FAMILIA</b></td>
		 			<td rowspan="3" align="center"><b>SISTEMA</b></td>
		 			<td colspan="3" rowspan="2" align="center"><b>PROGRAMADO</b></td>
		 			<td colspan="6" align="center"><b>PROGRAMADO MENSUAL / AVANCE (Plantines; area)</b></td>
		 			<td rowspan="3" align="center"><b>AVANCE Area  (%)</b></td>
		 			<td rowspan="3" align="center"><b>AVANCE Plantines (%)</b></td>
		 		</tr>
		 		<tr>
		 			<td colspan="4" align="center"><b>{{ $mes->form_mes }}</b></td>
		 			<td rowspan="2" align="center"><b>AV. ACUMULADO (ha)</b></td>
		 			<td rowspan="2" align="center"><b>AV. ACUMULADO (N participantes)</b></td>
		 		</tr>
		 		<tr>
		 			<td align="center"><b>Especie</b></td>
		 			<td align="center"><b>Area (ha)</b></td>
		 			<td align="center"><b>Plantines (Nr)</b></td>
		 			<td align="center"><b>PG (ha)</b></td>
		 			<td align="center"><b>PG (Nr)</b></td>
		 			<td align="center"><b>AV (ha)</b></td>
		 			<td align="center"><b>AV (Nr)</b></td>
		 		</tr>
                @foreach($actividad as $item)
		 		<tr>
		 			<td>{{ $item['form_familia'] }}</td>
		 			<td>{{ $item['form_sistema'] }}</td>
		 			<td>{{ $item['form_especie']}}</td>
		 			<td>{{ $item['form_area'] }}</td>
		 			<td>{{ $item['form_plantin'] }}</td>
		 			<td>{{ $item['form_programado'] }}</td>
		 			<td>{{ $item['form_programado2'] }}</td>
                    <td>{{ $item['form_avance'] }}</td>
		 			<td>{{ $item['form_avance2'] }}</td>
		 			<td>0</td>
		 			<td>0</td>
		 			<td>{{ $item['form_pavance'].'%' }}</td>
		 			<td>{{ $item['form_pavance2'].'%' }}</td>
		 		</tr>
                <?php
                    $totalEspecie += $item['form_especie'];
                    $totalArea += $item['form_area'];
                    $totalPlantin += $item['form_plantin'];
                    $totalProgramado += $item['form_programado'];
                    $totalProgramado2 += $item['form_programado2'];
                    $totalAvance += $item['form_avance'];
                    $totalAvance2 += $item['form_avance2'];
                    $totalPorcentaje += $item['form_pavance'];
                    $totalPorcentaje2 += $item['form_pavance2'];
                    $observaciones .= $item['form_obs'].', ';
                ?>
                @endforeach
		 		<tr>
		 			<td colspan="2" align="center"><b>TOTALES</b></td>
			 		<td>{{ $totalEspecie }}</td>
			 		<td>{{ $totalArea }}</td>
			 		<td>{{ $totalPlantin }}</td>
			 		<td>{{ $totalProgramado }}</td>
			 		<td>{{ $totalProgramado2 }}</td>
			 		<td>{{ $totalAvance }}</td>
			 		<td>{{ $totalAvance2 }}</td>
			 		<td>0</td>
			 		<td>0</td>
			 		<td>{{ $totalPorcentaje.'%' }}</td>
			 		<td>{{ $totalPorcentaje2.'%' }}</td>
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