<?php
    function mesAnio($fecha){
        $arrayFecha = explode('-',$fecha);
        $arrayMes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        return $arrayMes[(int)($arrayFecha[1]) - 1].'/'.$arrayFecha[0];
    }
?>