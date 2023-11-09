<?php

$errores = array();
$tieneNumeros = "/[0-9]/"; 
$tieneLetras = "/[A-z]/";


function soloLetras($name)
{
    global $tieneNumeros; 
    return preg_match($tieneNumeros, $_POST[$name]); 
}


function validacionCrear($conn)
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

     if(!subirFichero())
     {
        $errores[] = "Hay que subir una imagen";
      
     }
     else{
        echo " <br> Fichero : ". $_FILES['imagen']['name'];
    }
    
    visualizacionErrores($conn);
}

function visualizacionErrores($conn)
{
    global $errores;

    if (count($errores) == 0) {
        echo "<br> No hubo ningún fallo 👍  ";
        $nombre = " ' ".$_POST['nombre']." ' ";
        $precio = $_POST['precio'];
        $imagen = " ' ".$_FILES['imagen']['name']." ' ";
        $categoria = " ' ".$_POST['categoria']." ' ";

        $sentencia= "INSERT INTO productos(Nombre,Precio,Imagen,Categoría) VALUES ($nombre,$precio,$imagen,$categoria) ";
        if($conn->query($sentencia)==true){
            echo "Salió todo bien";
        }
        else{
            echo "Salió todo mal";
        }
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
        if(isset($_FILES["imagen"])){
            
            if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){
                $tmp_name = $_FILES["imagen"]["tmp_name"];
                $name = basename($_FILES["imagen"]["name"]);
                
                move_uploaded_file($tmp_name,"$dir_fichero/$name");
                return true;
            }
        }
        return false;
    }





?>