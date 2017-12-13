
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
                width:100%;
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
            .nota{
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
        <center><h3>CRONOGRAMA DE PROGRAMACION DEL PROYECTO</h3></center>
    </div>
    <div class="tableEspacios">
        <center><b>"{{ $solicitud->sol_nombre }}"</b></center>
    </div>
    <?php $cont = 1; ?>
	<table class="tableizer-table tableBorder">
		<tr>
            <td rowspan="2" align="center"><b>NRO.</b></td>
			<td colspan="2" align="center"><b>PROGRAMACION DEL PROYECTO</b></td>
			<td rowspan="2" align="center"><b>DESCRIPCION</b></td>
		</tr>
        <tr>
            <td align="center"><b>MES</b></td>
            <td align="center"><b>CORRESPONDE A</b></td>
        </tr>
		<tbody>
            @foreach($ejecutor as $item)
		 	<tr>
			 	<td align="center">{{ $cont++ }}</td>
			 	<td align="center">{{ $item->eje_mes }}</td>
			 	<td>{{ $item->eje_corresponde }}</td>
			 	<td>{{ $item->eje_descripcion }}</td>	 		
		 	</tr>
            @endforeach
		</tbody>
	</table>
    <br>
    {!! DNS2D::getBarcodeHTML(date('dmYHis')."1"."| una Cosa | Otra Cosa| ", "QRCODE",4,4) !!}
    <div class="nota">{{ $fechaImpresion }}</div>
</body>
</html>
