<?php
Require "validacion.php";
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
    <title>Document</title>
</head>

<style>


body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 20px 0;
            text-align: center;
        }

        select {
            width: 10%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            margin-left:45%;
          
        }

        label {
  display: block;
  margin-bottom: 8px;
  color: #333; 
}


input {
  width: 10%;
  padding: 8px;
  margin-bottom: 16px;
  box-sizing: border-box;
  border: 1px solid #ccc; 
  border-radius: 4px;
  margin-left:45%;
}


input[type="file"] {
  border: none; 
}


label[for="categoria"] {
  margin-top: 10px;
  font-weight: bold; 
}


</style>




<body>

<h1>Modificación productos</h1>
<form action="Modificar_Producto.php" method="get">
<label for="lang">Productos</label>
<select name="id">
<?php
$sentencia= $conn->prepare("select * from productos ");
$sentencia->execute();
$fila=$sentencia->fetch(PDO::FETCH_ASSOC);

while($fila!=false)
{
    
    echo "<option value='".$fila['id']."'>" .$fila['Nombre']." </option>";

    

$fila=$sentencia->fetch(PDO::FETCH_ASSOC);
}

$sentencia->execute();
$fila=$sentencia->fetch(PDO::FETCH_ASSOC);

?> 

</select>   
</label> 
<br><input type="submit" value="Enviar"></br>
</form>





<?php

 if(!empty($_GET)){
  $sentencia= $conn->prepare("SELECT * FROM productos WHERE Id = ".$_GET['id']);
  $sentencia->execute();
  $fila = $sentencia->fetch(PDO::FETCH_ASSOC);



 echo "<form action='Modificar_Producto.php' method='post' enctype='multipart/form-data' >";
 echo "<input type='text' id='ActualizarNombre' name='id' value='".$fila["id"]."' style='display:none'>";
 echo "<label for='nombre'>Nombre:</label>";
 echo "<input type='text' name='nombre' id='nombre'>";
 echo "<label for='precio'>Precio:</label>";
 echo "<input type='text' name='precio' id='precio'>";
 echo "<label for='imagen'>Imagen:</label>";
 echo "<input type='file' name='imagen' id='imagen'>";
 echo "<label for='categoria'>Categoría:</label>";

 $idC=$fila["Categoría"];
 $sentencia= $conn->prepare("select * from categorías ");
 $sentencia->execute();
 $fila=$sentencia->fetch(PDO::FETCH_ASSOC);


 while($fila!=false)
 {
  if($idC == $fila["Id"])
  echo ("<input type='radio' name='categoria' value='".$fila['Id']."' checked> ".$fila['Nombre']."</input><br>");
  else  
  echo ("<input type='radio' name='categoria' value='".$fila['Id']."' > ".$fila['Nombre']."</input><br>");

     $fila=$sentencia->fetch(PDO::FETCH_ASSOC);
 }


  echo "<br><input type='submit' value='Enviar' name='modificar'>";
  echo "</fieldset>";
  echo "</form>";

}
 ?>
  
</form>

<?php
    if(!empty($_POST))
    modificar($conn);
    ?>





</body>
</html>