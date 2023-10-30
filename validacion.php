<?php

$errores = array();
$tieneNumeros = "/.?[0-9].?/";
$tieneLetras= "/.?[A-Z].?/";

function soloLetras($name)
    {
        global $tieneNumeros;
        return preg_match($tieneNumeros,$_POST[$name]);
    }


    function validacionCrear()

   

    {

    global $errores,$tieneNumeros;

    if(soloLetras('nombre'))
    $errores[] = "El nombre solo debe incluir letras";
    if(!preg_match($tieneLetras,$_POST['precio']))
    $errores[] = "El precio tiene que ser válido";
    

     //Resultado Formulario
     echo" <br> //////////////////////////////////////////////////////////////////////";
     echo" <br> Nombre : ".$_POST['nombre'];

    }




?>