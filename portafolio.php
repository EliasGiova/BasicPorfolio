<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php

//insertar un registro en la base de datos
if ($_POST) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $fecha=new DateTime();
    $imagen = $fecha->getTimestamp()."_".$_FILES["archivo"]['name'];
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    move_uploaded_file($imagen_temporal, "img/".$imagen);

    $objConexion = new Conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
    $objConexion->ejecutar($sql);
    header("location:portafolio.php");
}

//eliminar registro en la base de datos
if($_GET){
    $id=$_GET['borrar'];
    $objConexion = new Conexion();
    $imagen=$objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id);
    $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id;
    unlink("img/".$imagen[0]['imagen']);
    $objConexion->ejecutar($sql);
    header("location:portafolio.php");
}

//consultar e imprimir el registro de la base de datos
$objConexion = new Conexion();
$proyectos = $objConexion->consultar("SELECT * FROM `proyectos`");

?>

<br />
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del Proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del Proyecto: <input type="text" class="form-control" name="nombre" id="" required><br />
                        Imagen del Proyecto: <input type="file" class="form-control" name="archivo" id="" required><br />
                        Descripción del Proyecto:<textarea class="form-control" name="descripcion" rows="3" required></textarea><br />
                        <input type="submit" class="btn btn-success" value="Enviar Proyecto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyecto) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $proyecto['id']; ?></td>
                            <td><?php echo $proyecto['nombre']; ?></td>
                            <td>
                                <img width="100" src="img/<?php echo $proyecto['imagen']; ?>" alt="">
                            </td>
                            <td><?php echo $proyecto['descripcion']; ?></td>
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("pie.php"); ?>