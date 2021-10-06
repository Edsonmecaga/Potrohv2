<?php
  include 'php/conexion.php';
?>



<html>
    <head>
        <title>Servicios | Potro hermandad</title>
        <link rel="stylesheet" href="css/potrop.css"><!-- Vinculación a los estilos css -->
    
        <meta charset="utf-8">
    
        <meta name="author" content="Edson Garduño Robles">
    
         <meta name="author" charset="UTF-8">
    
        <meta name="description" content="Sitio para contratar servicios de universitarios">
    
    </head>
    <body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="Index.html">Inicio</a>
                <a href="Nosotros.html">Nosotros</a>
                <a href="formulario.html">Contacto</a>
                <a href="lista_alumnos_productos.php" class="hover_color" >Productos</a>
                <a href="lista_alumnos.php">Servicios</a>
            </div>
        </nav>

         <div class="header__img"><!-- Clase para poner la imagen de fondo  -->
            <a href="#">
                <img class="header_img" src="img/banner.jpg" alt=""><!-- Imagen de fondo -->
                <div class="centrado_txt"><!-- Clase para el texto  -->
                    <h1>Servicios</h1>
                </div>
                <div class="centrado_img">
                    <img  class="centrado_img" src="" alt=""  >
                </div>
            </a>
            
        </div>
    </header>

    <h1>Lista de Productos</h1>
    
    
    <form action="buscar_producto.php" method="get" class="form_search">
       
       <input type="text" name="busqueda" id="busqueda" placeholder="Busca tu producto">
       <input type="submit" value="Buscar" class="btn_search">


   </form>

    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Carrera</th>
            <th>Servicios</th>
        </tr>
    

        <?php

        $query = mysqli_query ($conection, "SELECT inscritosp.id_control, inscritosp.nombre, inscritosp.correo, inscritosp.carrera, inscritosp.producto FROM inscritosp");
        $result =  mysqli_num_rows($query);

        if($result>0){

            while($data = mysqli_fetch_array($query)){

            ?>
                <tr>
            <td><?php echo $data["id_control"];?></td>
            <td><?php echo $data["nombre"];?></td>
            <td><?php echo $data["correo"];?></td>
            <td><?php echo $data["carrera"];?></td>
            <td><?php echo $data["producto"];?></td>
            
        </tr> 

        <?php
            }
        }else{

            ?>
                <tr>
            <td><?php echo"No hay registros"; ?></td>
            <?php
        }
        ?>
       

       
        

    </table>

    </body>

    </html>

