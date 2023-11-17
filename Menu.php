<?php

Require "comprobar.php";


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


#menu {
  background-color: #333;
  padding: 10px;
}

#menu ul {
  list-style-type: none;
  padding: 0;
}

#menu li {
  margin-bottom: 10px;
}

#menu a {
  text-decoration: none;
  color: #fff;
  font-weight: bold;
  display: block;
  padding: 5px;
}

#menu a:hover {
  background-color: #007BFF;
}

    </style>




<div id="menu">
   
     <ul>
        
        <li><a href="crearProducto.php">Crear producto</a></li>

        <li><a href="listado_producto.php">Consultar el listado de productos</a></li>
        <li><a href="Modificar_Producto.php">Modificar producto</a></li>
        <li><a href="eliminarProducto.php">Eliminar producto</a></li>
        <li><a href="cerrarSesion.php">Cerrar sesión</a></li>

      

    </ul>



    

</div>

   


</body>
</html>