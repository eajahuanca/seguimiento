
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
	        <center><h3>Planilla de Reporte Mensual Componente 3</h3></center>
	    </div>
	    <div class="tableEspacios">
	    <b>Componente 3:</b> Infraestructura 33333xxxxxx3x3x3x3x3
	    </div>


		<table class="tableizer-table tableBorder">
			<thead>
                <tr>
                    <th colspan="2" style="padding:7px"><b>No DE COMPONENTE :</b></th>
                    <th colspan="2" style="padding:7px">3 (xxx)</th>
                    <th style="padding:7px"><b>INDICADOR :</b></th>
					<th colspan="3" align="justify" style="padding:7px">500.000 PLANTINES</th>
				</tr>
			</thead>

			<tbody>
		 		<tr>
		 			<td rowspan="3" align="center" height="75px"><b>No</b></td>
		 			<td rowspan="3" align="center"><b>Especie</b></td>
		 			<td colspan ="2" rowspan="2" align="center"><b>PROGRAMADO</b></td>
		 			<td colspan ="3" align="center"><b>PROGRAMADO MENSUAL / AVANCE (Nº plantines)</b></td>
		 			<td rowspan="3" align="center"><b>AVANCE (%)</b></td>
		 		</tr>
		 		<tr>
		 			<td colspan="2" align="center"><b>MES 1:</b></td>
		 			<td rowspan="2" align="center"><b>AVANCE ACUMULADO (N plantines)</b></td>
		 		</tr>
				<tr>
					<td align="center"><b>N plantines</b></td>
					<td align="center"><b>Proporcion respect al total (%)</b></td>
					<td align="center"><b>PG </b></td>
					<td align="center"><b>AV </b></td>
				</tr>
				<tr>
					<td>1</td>
					<td>Sp1</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Sp2</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Sp3</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>4</td>
					<td>Sp4</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>5</td>
					<td>Sp5</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>6</td>
					<td>Sp6</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>0%</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><b>TOTALES</b></td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td>0%</td>
				</tr>
			</tbody>
		</table><br>
    <div class="nota">PG: Programado, AV: Avance</div><br>
    <div class="tableEspacios">Observaciones :</div>
    {!! DNS2D::getBarcodeHTML(date('dmYHis')."1"."|Nombre del Proyecto|Monto", "QRCODE",4,4) !!}
    <footer>
        <div class='impresion'>
            <p>{{ $fechaImpresion }}</p>
        </div>
    </footer>
</body>
</html>