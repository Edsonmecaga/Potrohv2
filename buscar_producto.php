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
                <a href="#">Nosotros</a>
                <a href="#">Contacto</a>
                <a href="lista_alumnos_productos.php" class="hover_color" >Productos</a>
                <a href="lista_alumnos.php">Servicios</a>
            </div>
        </nav>

         <div class="header__img"><!-- Clase para poner la imagen de fondo  -->
            <a href="#">
                <img class="header_img" src="img/banner.jpg" alt=""><!-- Imagen de fondo -->
                <div class="centrado_txt"><!-- Clase para el texto  -->
                    <h1>Productos</h1>
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
            header("location: lista_alumnos_producto.php");
        }

    ?>

    <h1>Lista de Servicios</h1>
    
    
    <form action="buscar_producto.php" method="get" class="form_search">
       
       <input type="text" name="busqueda" id="busqueda" placeholder="Busca tu producto" value="<?php echo $busqueda;?>"  >
       <input type="submit" value="Buscar" class="btn_search">


   </form>

    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Carrera</th>
            <th>Productos</th>
        </tr>

        <?php

$sql_registe = mysqli_query($conection, "SELECT inscritosp.id_control, inscritosp.nombre, inscritosp.correo, inscritosp.carrera, inscritosp.producto FROM inscritosp

WHERE
(
    id_control LIKE '%$busqueda%' OR
    Nombre     LIKE '%$busqueda%' OR
    correo     LIKE '%$busqueda%' OR
    carrera    LIKE '%$busqueda%' OR
    producto   LIKE '%$busqueda%')");

$sql_registe = mysqli_fetch_array($sql_registe);
//    $total_registro = $result_register['total_registro'];
$por_pagina = 5;

if(empty($_GET['pagina'])){
    $pagina = 1;

}else{
   $pagina = $_GET['pagina'];
}


$desde = ($pagina-1)* $por_pagina;

$query = mysqli_query($conection, "SELECT inscritosp.id_control, inscritosp.Nombre, inscritosp.correo, inscritosp.carrera, inscritosp.producto FROM inscritosp 

WHERE 
(
    id_control LIKE '%$busqueda%' OR
    nombre     LIKE '%$busqueda%' OR
    correo     LIKE '%$busqueda%' OR
    carrera    LIKE '%$busqueda%' OR
    servicio   LIKE '%$busqueda%')



ORDER BY inscritosp.id_control ASC LIMIT $desde, $por_pagina");

?>

<?php


$result = mysqli_num_rows($query);

if($result > 0){

    while($data = mysqli_fetch_array($query)){

        ?>
        <tr>
    <td><?php echo"No hay registros"; ?></td>
    <?php
    }
    
else{

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

}
?>





</table>

</body>

<footer>

<h6>Derechos Reservados</h6>


</footer>

</html>
