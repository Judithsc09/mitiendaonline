
<?php

Require "validacion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi tienda online</title>

</head>
<body>





<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #0074d9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

</style>

    
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="crearProducto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio">
        <label for="imagen">Fichero:</label>
        <input type="file" name="imagen" id="imagen">
        <label for="categoria">Categoría:</label>
        <input type="select" name="categoria" id="categoria">
        <br><input type="submit" value="Enviar"></br>
    </form>
   
   
   <?php
    if(!empty($_POST))
    validacionCrear()
    ?>


<?php

$servername = "localhost";
$username = "mitiendaonline";
$password = "Judith09";
$bd="mitiendaonline";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br>Connected successfully";
  } catch(PDOException $e) {
    echo "<br> Connection failed: " . $e->getMessage();
  }
      
?>



</body>



</html>