<?php
    session_start();
    if($_POST){
        if( ($_POST["usuario"]=="eliasgiova") && ($_POST["contraseña"]=="123456")){
            
            $_SESSION["usuario"]="eliasgiova";

            header("location:index.php");
        }else{
            echo "<script> alert('Usuario o contraseña Incorrecta'); </script>";
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <br />
                <div class="card">
                    <div class="card-header">
                        Iniciar Session
                        <div class="card-body">
                            <form action="login.php" method="post">
                                Usuario: <input type="text" class="form-control" name="usuario"><br />
                                Contraseña: <input type="password" class="form-control" name="contraseña"><br />
                                <button type="submit" class="btn btn-success">Entrar al portafolio</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

    </div>
    </div>
    </div>


    </div>
</body>

</html>