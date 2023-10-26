<?php include ("cabecera.php"); ?>
<?php include ("conexion.php"); ?>
<?php
    $objConexion = new Conexion();
    $proyectos = $objConexion->consultar("SELECT * FROM `proyectos`");
?>
<div class="row align-items-md-stretch">
    <div class="col-md-6">
        <div
            class="h-100 p-5 text-white bg-primary border rounded-3">
            <h1>Bienvenid@s</h1>
            <p>Este es un Portafolio Privado</p>
        </div>
    </div>
</div>
<?php foreach ($proyectos as $proyecto) { ?>
                     
<?php } ?>
<?php include ("pie.php"); ?>
