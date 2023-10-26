<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php

//insertar un registro en la base de datos
if ($_POST) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_FILES["archivo"]['name'];

    $objConexion = new Conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
    $objConexion->ejecutar($sql);
}

//eliminar registro en la base de datos
if($_GET){
    $objConexion = new Conexion();
    $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$_GET['borrar'];
    $objConexion->ejecutar($sql);
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
                        Nombre del Proyecto: <input type="text" class="form-control" name="nombre" id=""><br />
                        Imagen del Proyecto: <input type="file" class="form-control" name="archivo" id=""><br />
                        Descripción del Proyecto:<textarea class="form-control" name="descripcion" rows="3"></textarea><br />
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
                            <td><?php echo $proyecto['imagen']; ?></td>
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