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
        <center><h3>Planilla de Reporte Mensual Componente 1</h3></center>
    </div>
    <div class="tableEspacios">
    <b>Componente 1:</b> Infraestructura y equipamiento para la producción de plantines (vivero) construida
    </div>
    <table class="tableizer-table tableBorder">
        <thead>
            <tr>
                <th colspan="2" style="padding:7px"><b>No DE COMPONENTE :</b></th>
                <th colspan="2" style="padding:7px">1 (xxx)</th>
                <th style="padding:7px"><b>INDICADOR :</b></th>
                <th colspan="3" align="justify" style="padding:7px">Infraestructura y equipamiento para la producción de plantines (vivero construido)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="3" align="center" height="75px"><b>Nro</b></td>
                <td rowspan="3" align="center"><b>Descripción de la compra o acción (unidad)</b></td>
                <td rowspan="2" colspan="2" align="center"><b>PROGRAMADO</b></td>
                <td colspan="4" align="center"><b>PROGRAMADO MENSUAL / AVANCE</b></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><b>MES 1: </b></td>
                <td align="center"><b>AVANCE ACUMULADO</b></td>
                <td align="center"><b>AVANCE Plantines</b></td>
            </tr>
            <tr>
                <td align="center"><b>Cantidad</b></td>
                <td align="center"><b>Unidad</b></td>
                <td align="center"><b>PG</b></td>
                <td align="center"><b>AV</b></td>
                <td align="center"><b>(Cantidad)</b></td>
                <td align="center"><b>(%)</b></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Estacas</td>
                <td>20</td>
                <td>pzas</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>2</td>
                <td>horcones</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>3</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>4</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>5</td>
                <td>&nbsp;</td>
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
</body>
</html>