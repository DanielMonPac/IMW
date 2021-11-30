<!DOCTYPE html>
<html lang="es">
<?php
include 'funciones.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/estilos2.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

</head>

<body>
    <section class="Registro">
        <h1 class="title">Registro</h1>
        <form class="Formulario row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-field col-lg-4">
                <input type="text" id="Nombre" name="nombre" class="input-text" placeholder="Nombre" required>
            </div>

            <div class="form-field col-lg-4">
                <input type="text" name="apellido1" class="input-text" placeholder="Primer Apellido" required>
            </div>
            <div class="form-field col-lg-4">
                <input type="text" name="apellido2" class="input-text" placeholder="Segundo Apellido" required>
            </div>


            <div class="form-field col-lg-4">

                <select class="form-select form-select-sm" name="dia" id="dia">
                    <option selected> Seleccione el dia </option>
                    <?php dia() ?>
                </select>
            </div>
            <div class="form-field col-lg-4 select">
                <label class="label fechanac" for="fechanac">FECHA DE NACIMIENTO</label>
                <select class="form-select form-select-sm" name="mes" id="mes">
                    <option selected> Seleccione el mes </option>
                    <?php meses()  ?>
                </select>
            </div>
            <div class="form-field col-lg-4">
                <select class="form-select form-select-sm" name="anyo" id="anyo">
                    <option selected> Seleccione el año </option>
                    <?php anyo()  ?>
                </select>
            </div>



            <div class="form-field col-lg-3 check">
                <label class="label" for="Estudios">ESTUDIOS</label>
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" name="estudios[]" value="sin_estudios" checked="checked"> SIN ESTUDIOS </input>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="primaria"> PRIMARIA </input>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="eso"> ESO </input>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="bachiller"> BACHILLER </input>
                </div>
            </div>
            <div class="form-field col-lg-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="fpb"> FPB </input>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="cfgm"> CFGM </input>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="cfgs"> CFGS </input>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="carrera"> CARRERA </input>
                </div>
            </div>


            <div class=" form-field col-lg-3 radio">
                <label class="label " for="sexo">SEXO</label>
                <div class="form-check">
                    <input type="radio" name="sexo" value="masculino"> Masculino</input>
                </div>
                <div class="form-check">
                    <input type="radio" name="sexo" value="femenino"> Femenino</input>
                </div>
                <div class="form-check">
                    <input type="radio" name="sexo" value="nobinario"> Otro</input>
                </div>
            </div>


            <div class="form-field col-lg-6 select2">
                <label class="label" for="provincia">PROVINCIA</label>
                <select class="form-select form-select-sm" id="provincia" name="provincia">
                    <option> Seleccione la provincia </option>
                </select>
            </div>
            <div class="form-field col-lg-6 select3">
                <label class="label" for="municipio">MUNICIPIO</label>
                <select class="form-select form-select-sm" id="municipio" name="municipio">
                    <option> Seleccione el municipio </option>
                </select>
            </div>


            <div class="form-field col-lg-3">
                <input class="input-text" type="text" name="usuario" minlength="6" maxlength="15" placeholder="Usuario" required>
            </div>

            <div class="form-field col-lg-9">
                <input type="text" name="email" class="input-text" placeholder="nombre@mail.com">
            </div>
            <div class="form-field col-lg-6">
                <input class="input-text" type="password" name="pass" maxlength="15" required placeholder="Contraseña">
            </div>
            <div class="form-field col-lg-6">
                <input class="input-text" type="password" name="confirmarpass" maxlength="15" placeholder="Confirmar contraseña" required>
            </div>

            <div class="form-field col-lg-12">
                <label class="label">OBSERVACIONES</label><br>
                <textarea class="input-text" rows="4" cols="105" name="observaciones" placeholder="Escribe lo que quieras...."></textarea>
            </div>

            <div class="form-field col-lg-12">
                <label class="label">IMAGEN</label><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
                <input type="file" name="imagen">

            </div>
            <div class="form-field col-lg-8">
                <input type="submit" class="submit-btn" name="registrar" value="Registrar"></input>
            </div>
            <div class="form-field col-lg-4">
                <a class="submit-btn" href="login.php">Volver</a>
            </div>
            <div class="form-field col-lg-12">
                <?php registrar($info) ?>
            </div>
        </form>
    </section>
    <script>
        $(document).ready(function() {
            var municipios = [];

            $.getJSON("info/provincias.json", function(provincias) {
                $.each(provincias, function(indice, dato) {
                    $('#provincia').append($('<option></option>').attr('value', dato.provincia_id).text(dato.nombre));
                })
            });

            $.getJSON("info/municipios.json", function(data) {
                municipios = data;
            });

            $("#provincia").change(function() {
                $('#municipio').empty();

                $.each(municipios, function(indice, dato) {
                    if ($("#provincia").val() == dato.provincia_id) {
                        $('#municipio').append($('<option></option>').attr('value', dato.municipio_id).text(dato.nombre));
                    }
                })
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>