<?php

$errores = array();
$tieneNumeros = "/[0-9]/"; 
$tieneLetras = "/[A-z]/";


function soloLetras($name)
{
    global $tieneNumeros; 
    return preg_match($tieneNumeros, $_POST[$name]); 
}


function validacionCrear()
{
    global $errores, $tieneLetras;

    if (soloLetras('nombre'))
        $errores[] = "El nombre solo debe incluir letras";
    else
    {
        echo " <br> Nombre : " . $_POST['nombre'];
    }
    

    if (preg_match($tieneLetras, $_POST['precio'])) 
        $errores[] = "El precio tiene que ser válido";

    else{
        echo " <br> precio : " . $_POST['precio'];
    }

     if(subirFichero())
     {
        $errores[] = "No se pudo subir el fichero";
      
     }
     else{
        echo " <br> Fichero : ". $_POST['imagen'];
    }
    
    visualizacionErrores();
}

function visualizacionErrores()
{
    global $errores;

    if (count($errores) == 0) {
        echo "<br> No hubo ningún fallo 👍  ";
    } else {
        $i = 1;
        echo "<br>HAZ FALLADO😢, los fallos son:<br>";

        foreach ($errores as &$salida) {
            echo $i . "- " . $salida . "<br>";
            $i++;
        }
    }
}

function subirFichero()
    {
        $dir_fichero='./Tienda';
        if(isset($_FILES["Tiendas"])){
            
            if($_FILES["Tiendas"]["error"]==UPLOAD_ERR_OK){
                $tmp_name = $_FILES["Tiendas"]["tmp_name"];
                $name = basename($_FILES["Tiendas"]["name"]);
                
                move_uploaded_file($tmp_name,"$dir_fichero/$name");
                return true;
            }
        }
        return false;
    }


?>