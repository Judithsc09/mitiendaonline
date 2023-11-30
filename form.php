

<?php

session_start();

$servername = "localhost";
$username = "mitiendaonline";
$password = "Judith09";
$bd="mitiendaonline";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sentencia= $conn->prepare("select contrasena_hash from usuarios2 where correo_electronico like '".$_POST['correo']."'");
    $sentencia->execute();
    $fila=$sentencia->fetch(PDO::FETCH_ASSOC);
  
   

    if(password_verify( $_POST['pass'],  $fila['contrasena_hash']))
    {

      session_start();
       $_SESSION["usuario"]=$_POST['correo'] ;
        echo $_SESSION["usuario"];
        header("Location:Menu.php");
      exit();

       } else {
        header("Location:id.php");
        }

    } catch(PDOException $e) {
    echo "<br> Connection failed: " . $e->getMessage();
    }
     

 


 
    





?>