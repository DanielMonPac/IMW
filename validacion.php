
<!DOCTYPE html>
<html lang="es">
<?php
include 'funciones.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/estilo.css" rel="stylesheet">


</head>

<body>
<?php session_start();?>
    <div class="container div">

        <h1 class="title">ACCESO AL ÁREA PERSONAL</h1>
        <h2 class="text-center mt-1 text-info">Bienvenido, <?php echo $_SESSION["usuario"] ?></h2>
        <div class="caja text-center">

            <div class="row justify-content-md-center">
                <div class="col col-lg-10 mt-1">
                    <li class="list-unstyled ml-3">
                        <ul><a href="#" class=""><b>INICIO</b></a></ul>
                        <ul><a href="#" class=""><b>MI CUENTA</b></a></ul>
                        <ul><a href="#" class=""><b>AYUDA</b></a></ul>
                        <ul><a href="#" class=""><b>CONTACTO</b></a></ul>
                        <ul><a href="#" class=""><b>AJUSTES</b></a></ul>
                    </li>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input class="submit-btn" type="submit" name="logout" value="Cerrar Sesion" > <br>
                    <?php CerrarSesion() ?>
                    </form>
                    
                </div>
                
                    
                

            </div>
        </div>

    </div>
    
</body>

</html>