<?php


$errores = array();
$tieneNumeros = "/.?[0-9].?/";
$tieneLetras= "/.?[A-Z].?/" ;



function soloLetras($name)
    {
        global $tieneNumeros;
        return preg_match($tieneNumeros,$_POST[$name]);
    }



    function validacionJudith()
    {
        global $errores,$tieneNumeros,$tieneLetras;
        if(soloLetras('nombre'))
        $errores[] = "El nombre solo debe incluir letras";
        if(soloLetras('nombre'))
        $errores[] = "El nombre solo debe incluir letras";


    }

?>