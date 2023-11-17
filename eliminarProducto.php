<?php
Require "comprobar.php";
    require "validacion.php";
    $conn = new PDO("mysql:host=$servername;dbname=$bd",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
</head>
<body>
        <?php
            if(empty($_GET)){
                echo "<form action='eliminarProducto.php' method='get'>";
                echo "<fieldset>";
                echo "<label class='lbleliminar' >Elije el Producto:</label>";
                echo "<select name='id'>";
                       
                $sentencia= $conn->prepare("SELECT Nombre,id FROM productos");
                $sentencia->execute();
                $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
                while($fila!=false){
                    echo "<option value='".$fila["id"]."'>".$fila["Nombre"]."</option>";
                    $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
                }
                echo "</select>";
                echo "<br>";
                echo "<input type='submit' value='Seleccionar producto' name='producto'>";
                echo "</fieldset>";
                echo "</form>";
            }
        ?>

        <?php
            if(!empty($_GET))
            {
                $sql="DELETE FROM productos WHERE id like ".$_GET["id"];
                if($conn->query($sql)==TRUE)
                    echo "<h2>Todo salio bien</h2>";
                else
                    echo "<h2>fallo al eliminar<h2>"; 
                echo "<a href='Menu.php'>Volver al menu principal</a>";
            }
        ?>
</body>
</html>