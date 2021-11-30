<?php /** @noinspection PhpInconsistentReturnPointsInspection */
/** @noinspection PhpInconsistentReturnPointsInspection */

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

//Variables vacias 

$info = "";


//Funcion para validar el usuario y contraseña.

function usuarioValido($logeo)
{
    $usuarios = leerUsuarios();
    foreach ($usuarios as $valor) {
        if ($valor["usuario"] == $logeo["usuario"] && md5($valor["pass"]) == md5($logeo["pass"])) {

            return true;
        } else {
            return false;
        }

    }
    return false;
}

//Funcion para validar el usuario y contraseña del login al pulsar el boton Logear
function Validacion()
{

    if (isset($_POST["Logear"])) {

        $usuario = filtrado($_POST["usuario"]);
        $pass = filtrado($_POST["pass"]);

        $logeo = ["usuario" => ($usuario), "pass" => md5($pass)];

        if (usuarioValido($logeo)) {
            session_start();
            $_SESSION["usuario"] = $usuario;
            echo "<p style=\"color:white; text-align:center; background-color:green;\">"."Usuario correcto, Iniciando Sesion"."</p>";
            
            header('refresh:5;url=validacion.php');
        } else {
            echo "<p style=\"color:white; text-align:center; background-color:red;\">"."El usuario o la contraseña es incorrecta, intentelo de nuevo"."</p>";
        }
    }
}

function CerrarSesion()
{
    if (isset($_POST["logout"])) {
        session_start();
        echo "<p style=\"color:white; text-align:center; background-color:black;\">"."Cerrando sesion del usuario ".$_SESSION["usuario"]." correctamente"."</p>";
        session_destroy();
        header('refresh:5;url=login.php');
    }
}
// Funcion para leer el fichero usuarios.json
function leerUsuarios()
{

    $usuarios = [];

    if (file_exists("info/usuarios.json")) {
        $datosEnJson = file_get_contents("info/usuarios.json", true);

        $usuarios = json_decode($datosEnJson, true);
    }

    return $usuarios;
}

//Funcion para registrar el usuario con la contraseña en el fichero usuarios.json

function registrarUsuario($info)
{

    // Leer usuarios anteriores.


    $usuarios = leerUsuarios();


    // Añadir nuevo usuario al array anterior.

    array_push($usuarios, $info);

    $json = json_encode($usuarios);

    file_put_contents("info/usuarios.json", $json);

    echo "<p style=\"color:white; text-align:center; background-color:green;\">"."Usuario registrado correctamente"."</p>";
}

//Funcion para comprobar que un usuario existe en el usuarios.json

function existe_usuario($info)
{
    $usuarios = leerUsuarios();
    foreach ($usuarios as $key) {
        if (in_array($info["usuario"], $key)) {
            return true;
        }
    }
    return false;
}

//Funcion para comprobar que la contraseñas son iguales

function mismapass($info)
{
    if (md5($info["pass"]) == md5($info["confirmarpass"])) {
        return true;
    } else {
        return false;
    }
}

//Funcion para comprobar que el usuario existe o no en el usuario .json y que las contraseñas son iguales y una vez hecho eso me lo registra en el usuarios.json
function registrar($info)
{
    if (isset($_POST["registrar"])) {
            $nombre = filtrado($_POST["nombre"]);
            $apellido1 = filtrado($_POST["apellido1"]);
            $apellido2 = filtrado($_POST["apellido2"]);
            $dia = filtrado($_POST["dia"]);
            $mes = filtrado($_POST["mes"]);
            $anyo = filtrado($_POST["anyo"]);
            $sexo = filtrado($_POST["sexo"]);
            $estudios = filtrado(implode(", ", $_POST["estudios"]));
            $provincia = filtrado($_POST["provincia"]);
            $municipio = filtrado($_POST["municipio"]);
            $usuario = filtrado($_POST["usuario"]);
            $email = filtrado($_POST["email"]);
            $pass = filtrado($_POST["pass"]);
            $confirmarpass = filtrado($_POST["confirmarpass"]);
            $observaciones = filtrado($_POST["observaciones"]);
            $fechanac = [$dia,$mes,$anyo];
    
            $info = ["nombre" => $nombre, "apellido1" => $apellido1, "apellido2" => $apellido2, "fecha_nacimiento" => $fechanac,
                "sexo" => $sexo, "estudios" => $estudios, "provincia" => $provincia, "municipio" => $municipio, "usuario" => $usuario,
                "email" => $email, "pass" => md5($pass), "confirmarpass" => md5($confirmarpass), "observaciones" => $observaciones ];

            if (!existe_usuario($info)) {
                if (mismapass($info)) {
                    
                    if (SubirFoto() == true) {
                        registrarUsuario($info);
                    } 
                    
                } else {
                    echo "<p style=\"color:white; text-align:center; background-color:red;\">"."Las contraseñas no son iguales"."</p>";
                }
            } else {
                echo "<p style=\"color:white; text-align:center; background-color:red;\">"."El usuario ya existe"."</p>";
            }
            
        }
        
    }


function SubirFoto()
{

    $directorioSubida = "info/img/";  // Carpeta donde queremos subir los archivos.
    $max_file_size = "20000"; // Tamaño máximo del archivo en bytes.
    $extensionesValidas = array("jpg", "png", "PNG", "JPG");

    if (isset($_POST["registrar"]) && isset($_FILES["imagen"])) {
        $errores = [];
        $nombreArchivo = $_FILES["imagen"]["name"];
        $filesize = $_FILES["imagen"]["size"];
        $directorioTemp = $_FILES["imagen"]["tmp_name"];
        $tipoArchivo = $_FILES["imagen"]["type"];
        $arrayArchivo = pathinfo($nombreArchivo);   // Nos da información de la extensión del archivo
        $extension = $arrayArchivo["extension"];

        // Comprobamos la extensión del archivo
        if (!in_array($extension, $extensionesValidas)) {
            if (!empty($nombreArchivo && $extension)) {
                $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            }
        }

        // Comprobamos el tamaño del archivo
        if ($filesize > $max_file_size) {
            $errores[] = "La imagen debe de tener un tamaño inferior a 20 kb";
            
        }

        // Copiamos el archivo si no hay errores
        if (empty($errores)) {
            $nombreCompleto = $directorioSubida . $nombreArchivo;
            move_uploaded_file($directorioTemp, $nombreCompleto);
            return true;
        } else {
            // Mostrar errores.   
            echo "<ul style=\"color:white; text-align:center; background-color:red;\"><li>" . implode("</li><li style=\"color:white; \">", $errores) . "</li></ul>";
            return false;
        }
    }
}

function dia()
{

    // Dias

    $i = 1;
    while ($i <= 31) {

        if ($i < 10) {
            $dia = '0' . $i;
        } else {
            $dia = $i;
        }

        echo "<option value='$dia'>$dia</option>";

        $i++;
    }
}


function meses()
{
    $meses = array(
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    );

    foreach ($meses as $num_mes => $mes) {
        echo "<option value='$num_mes'>$mes</option>";
    }
}

function anyo()
{
    $tope = date('Y');

    $e_max = 75;
    $e_min = 16;

    $anyo = $tope - $e_min;

    while ($anyo >= ($tope - $e_max)) {
        echo "<option value='$anyo'>$anyo</option>";
        --$anyo;
    }
}


function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}
