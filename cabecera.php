<?php

session_start();
if (isset($_SESSION['usuario'])!="eliasgiova"){
    header("location:login.php");
}//validacion para el inicio de session s, no esta logueado
//no muestra los menu.

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Portafolio</title>
</head>

<body>
    <div class="container">
        <a href="index.php"> Inicio </a> |
        <a href="portafolio.php"> Portafolio </a> |
        <a href="cerrar.php"> Cerrar </a>
        <br />