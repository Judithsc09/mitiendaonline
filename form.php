

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
     

  $sentencia= $conn->prepare("select contrasena_hash from usuarios2 ");
  $sentencia->execute();
  $fila=$sentencia->fetch(PDO::FETCH_ASSOC);

  //verificación

  if(password_verify( $_POST['pass'],  $fila['contrasena_hash']))
    {
    echo '<br>La contraseña es válida!';
    } else {
    echo '<br>La contraseña no es válida.';
    }

  





?>