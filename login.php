<!DOCTYPE html>
<html lang="es">
<?php
include 'funciones.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Login</title>

    <!-- CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/estilos2.css" rel="stylesheet">


    <!-- jquery.validate -->

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

</head>

<body>
    <section id="Login">
        <h1 class="title">Login</h1>
        <form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class=" Formulario row">

            <div class="form-field col-lg-12">
                <input name="usuario" type="text" class="input-text" placeholder="Escribe tu nombre de usuario" minlength="6" maxlength="15" required >
            </div>

            <div class="form-field col-lg-12">
                <input name="pass" type="password" class="input-text" placeholder="Contraseña" minlength="6" maxlength="15" required >
            </div>

            <div class="form-field col-lg-8">
                <input class="submit-btn" type="submit" name="Logear" value="Iniciar Sesion">
            </div>


            <div class="form-field col-lg-4">
                <a class="submit-btn" href="registrar.php">Registrar</a>

            </div>

            <div style="text-align: center">

                <a class="submit-btn" href="index.php">Volver</a>
            </div>
            <div class="form-field col-lg-12">
            <?php Validacion(); ?>
            </div>
        </form>
    </section>


        <script>
            $(document).ready(function() {
                $("#login").validate({
                    // Definición de los mensajes de error.
                    messages: {
                        usuario: {
                            required: 'El usuario es requerido',
                            minlength: 'La longitud minina es de {0} caracteres.',
                            maxlength: 'La longitud maxima es de {0} caracteres.'
                        },
                        pass: {
                            required: "La password es obligatoria.",
                            minlength: 'La longitud minina es de {0} caracteres.',
                            maxlength: 'La longitud maxima es de {0} caracteres.'
                        }
                    },

                    // Restricciones de los campos.
                    rules: {
                        usuario: {
                            required: true,
                            minlength: 6,
                            maxlength: 15
                        },
                        pass: {
                            required: true,
                            minlength: 6,
                            maxlength: 15
                        }
                    }
                });
            });
        </script>


        

</body>

</html>