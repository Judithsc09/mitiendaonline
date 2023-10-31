<?php

$errores = array();
$tieneNumeros = "/[0-9]/"; 
$tieneLetras = "/[A-Z]/";

function soloLetras($name)
{
    global $tieneNumeros; 
    return !preg_match($tieneNumeros, $_POST[$name]); 
}

function validacionCrear()
{
    global $errores, $tieneLetras;

    if (soloLetras('nombre'))
        $errores[] = "El nombre solo debe incluir letras";
    

    if (!preg_match($tieneLetras, $_POST['precio'])) 
        $errores[] = "El precio tiene que ser válido";
    

    // Resultado Formulario
    
    echo " <br> Nombre : " . $_POST['nombre'];
    echo " <br> precio : " . $_POST['precio'];

    visualizacionErrores();
}

function visualizacionErrores()
{
    global $errores;

    if (count($errores) == 0) {
        echo "No hubo ningún fallo";
    } else {
        $i = 1;
        echo "<br>HAZ FALLADO, los fallos son:<br>";

        foreach ($errores as &$salida) {
            echo $i . "- " . $salida . "<br>";
            $i++;
        }
    }
}



?>