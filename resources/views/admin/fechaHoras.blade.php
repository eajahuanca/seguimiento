<?php
    function fecha($fecha){
        $arrayFecha = explode('-',$fecha);
        $arrayDia = explode(' ', $arrayFecha[2]);
        return $arrayDia[0].' de '.mes($arrayFecha[1]).' de '.$arrayFecha[0];
    }
    
    function hora($fecha){
        $arrayFecha = explode('-',$fecha);
        $arrayHora = explode(' ', $arrayFecha[2]);
        return 'Hora '.$arrayHora[1];
    }

    function mes($mesInt){
        $arrayMes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        return $arrayMes[(int)$mesInt - 1];
    }
?>