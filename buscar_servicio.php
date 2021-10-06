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
                <a href="#">Contacto</a>
                <a href="lista_alumnos_productos.php">Productos</a>
                <a href="lista_alumnos.php" class="hover_color"  >Servicios</a>
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

    <?php

        $busqueda = strtolower($_REQUEST['busqueda']);
        if(empty($busqueda)){
            header("location: lista_alumnos.php");
        }

    ?>

    <h1>Lista de Servicios</h1>
    
    
    <form action="buscar_servicio.php" method="get" class="form_search">
       
       <input type="text" name="busqueda" id="busqueda" placeholder="Busca tu servicio" value="<?php echo $busqueda;?>"  >
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

        $sql_registe = mysqli_query($conection, "SELECT inscritos.id_control, inscritos.Nombre, inscritos.correo, inscritos.carrera, inscritos.servicio FROM inscritos

        WHERE
        (
            id_control LIKE '%$busqueda%' OR
            Nombre     LIKE '%$busqueda%' OR
            correo     LIKE '%$busqueda%' OR
            carrera    LIKE '%$busqueda%' OR
            servicio   LIKE '%$busqueda%')");

       $sql_registe = mysqli_fetch_array($sql_registe);
    //    $total_registro = $result_register['total_registro'];
       $por_pagina = 5;

       if(empty($_GET['pagina'])){
            $pagina = 1;

       }else{
           $pagina = $_GET['pagina'];
       }


       $desde = ($pagina-1)* $por_pagina;

       $query = mysqli_query($conection, "SELECT inscritos.id_control, inscritos.Nombre, inscritos.correo, inscritos.carrera, inscritos.servicio FROM inscritos 
       
       WHERE 
       (
            id_control LIKE '%$busqueda%' OR
            Nombre     LIKE '%$busqueda%' OR
            correo     LIKE '%$busqueda%' OR
            carrera    LIKE '%$busqueda%' OR
            servicio   LIKE '%$busqueda%')

       
       
       ORDER BY inscritos.id_control ASC LIMIT $desde, $por_pagina");

?>

        <?php

        
        $result = mysqli_num_rows($query);

        if($result>0){

            while($data = mysqli_fetch_array($query)){

            ?>
                <tr>
            <td><?php echo $data["id_control"];?></td>
            <td><?php echo $data["Nombre"];?></td>
            <td><?php echo $data["correo"];?></td>
            <td><?php echo $data["carrera"];?></td>
            <td><?php echo $data["servicio"];?></td>
            
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

    <footer>

        <h6>Derechos Reservados</h6>


    </footer>

    </html>

