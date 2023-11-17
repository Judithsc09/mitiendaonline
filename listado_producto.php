<?php
Require "comprobar.php";
$servername = "localhost";
$username = "mitiendaonline";
$password = "Judith09";
$bd="mitiendaonline";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
    // set the PDO error mode to exception
    echo "<br>Connected successfully";
  } catch(PDOException $e) {
    echo "<br> Connection failed: " . $e->getMessage();
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Producto</title>
</head>
<body>


<style>

table {
   border-collapse: separate;
   border-spacing: 5px;
   background: #000 url("gradient.gif") bottom left repeat-x;
   color: #fff;
}
td, th {
   background: #fff;
   color: #000;
}

</style>





<table>

  <tr>

    <td>Nombre</td>

    <td>Precio</td>

    <td>Imagen</td>

    <td>Categoría</td>

    <td><a href="Eliminar_Producto.php" >Eliminar</a> </td>
    <td><a href="Modificar_Producto.php" >Modificar</a> </td>
    

  </tr>

  <?php

$sentencia= $conn->prepare("select productos.Nombre,productos.Precio,productos.Imagen, categorías.Nombre as Nombrec from productos,categorías where productos.Categoría=categorías.Id");
$sentencia->execute();
$fila=$sentencia->fetch(PDO::FETCH_ASSOC);
     while($fila!=false)
     {
        echo "<tr>";

        echo " <td>".$fila['Nombre']." </td>";
        echo " <td>".$fila['Precio']." </td>" ;
        echo " <td><img src='./Tienda/".$fila['Imagen']."' width=150> </td>";
        echo " <td>".$fila['Nombrec']." </td>";
  
        echo"</tr>";
     $fila=$sentencia->fetch(PDO::FETCH_ASSOC);
    }
    $sentencia->execute();
    $fila=$sentencia->fetch(PDO::FETCH_ASSOC);

    ?>



</table>




    
</body>
</html>