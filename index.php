<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible content=ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel=stylesheet type="text/css" href="css/estilos2.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Página principal</title>
</head>

<body id="Login">
    <div style="text-align: center">

        <h3>Registro</h3>
        <a href="login.php"><img src="imagenes/registro.png" width="50px;"></a>
        <hr>

        <h3>Vista de productos disponibles / Carro de la compra</h3>
        <a href="carrito.php"><img src="imagenes/carrito.png" width="50px;"></a>

        <table  style="width 600px;">
            <div>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>DESCRIPCION</th>
                <th>CANTIDAD</th>
            </div>
            <div>
                <tr style="width:600px">
                    <td style="width:100px;">1020</td>

                    <td style="width:100px;">
                        <img src="imagenes/monster.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.00€ | Monster clásico
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster clásico">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.00">
                        <input type="submit"  name="btnAgregar"value="Agragar">
                    </form>
                    </td>
                </tr>


                <tr style="width:600px">
                    <td style="width:100px;">1040</td>

                    <td style="width:100px;">
                        <img src="imagenes/ultra.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.50€ | Monster Ultra
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Ultra">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.50">
                        <input type="submit"  name="btnAgregar"value="Agragar">
                    </form>
                    </td>
                </tr>


                <tr style="width:600px">
                    <td style="width:100px;">2000</td>

                    <td style="width:100px;">
                        <img src="imagenes/ultraparadise.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.50€ | Monster Ultraparadise
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Ultraparadise">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.50">
                        <input type="submit"  name="btnAgregar"value="Agragar">
                    </form>
                    </td>
                </tr>

                <tr style="width:600px">
                    <td style="width:100px;">2010</td>

                    <td style="width:100px;">
                        <img src="imagenes/ultrared.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.50€ | Monster Ultrared
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Ultrared">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.50">
                        <input type="submit"  name="btnAgregar"value="Agragar">
                    </form>
                    </td>
                </tr>


                <tr style="width:600px">
                    <td style="width:100px;">2020</td>

                    <td style="width:100px;">
                        <img src="imagenes/ultrasunride.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.50€ | Monster Ultrasunride
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Ultrasunride">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.50">
                        <input type="submit"  name="btnAgregar"value="Agragar">
                    </form>
                    </td>
                </tr>


                <tr style="width:600px">
                    <td style="width:100px;">2030</td>

                    <td style="width:100px;">
                        <img src="imagenes/ultraviolet.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.50€ | Monster Ultraviolet
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Ultraviolet">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.50">
                        <input type="submit"  name="btnAgregar" value="Agragar">
                    </form>
                    </td>
                </tr>


                <tr style="width:600px">
                    <td style="width:100px;">1040</td>

                    <td style="width:100px;">
                        <img src="imagenes/juiced.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.25€ | Monster Juiced
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Juiced">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.25">
                        <input type="submit"  name="btnAgregar" value="Agragar">
                    </form>
                    </td>
                </tr>


                <tr style="width:600px">
                    <td style="width:100px;">1040</td>

                    <td style="width:100px;">
                        <img src="imagenes/punch.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.25€ | Monster Punch
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Punch">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br>
                        <input type="hidden" name="Precio" value="1.25">
                        <input type="submit"  name="btnAgregar" value="Agragar">
                    </form>
                    </td>
                </tr>

                
                <tr style="width:600px">
                    <td style="width:100px;">1040</td>

                    <td style="width:100px;">
                        <img src="imagenes/zero.png" width="100px" height="100px">
                    </td>

                    <td style="width:300px;">
                        Descripción:<br> 1.00€ | Monster Zero
                    </td>

                    <td style="width:300px;">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="Producto" value="Monster Zero">
                        <input type="number" name="Cantidad" value="1" style="width:50px;"><br
                        <input type="hidden" name="Precio" value="1.00">
                        <input type="submit"  name="btnAgregar" value="Agragar">
                    </form>
                    </td>
                </tr>

        </table>
    </div>

    <?php
        if(isset($_REQUEST["btnAgregar"])){
            $producto = $_REQUEST["Producto"];
            $cantidad = $_REQUEST["Cantidad"];
            $precio = $_REQUEST["Precio"];

            $_SESSION["carrito"][$producto]["Cantidad"] = $cantidad;
            $_SESSION["carrito"][$producto]["Precio"] = $precio;

            echo "<script>alert('Producto $producto agregado al carro');</script>";
        }
    ?>


</body>
</html>
