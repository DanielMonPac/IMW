<?php
    session_start();

   $total = 0;

    echo "<h3>Carro de la compra: </h3>";

    if(isset($_SESSION["carrito"])){

        foreach($_SESSION["carrito"] as $indice => $arreglo){
            echo "<hr>Producto: ". $indice . "<br>";
            $total += $arreglo["Cantidad"] * $arreglo["Precio"];
            foreach($arreglo as $key => $value){
                echo $key .": " . $value . "<br>";
            }
            echo "<a href='carrito.php?producto=$indice'>Eliminar objeto</a>";
        }
        echo "<h3>El total de la compra es de $total €.</h3>";

        echo '<br><br><a href="index.php">Seguir comprando</a>';
        echo '<br><br><a href="compra.php">Validar compra y pagar</a>';
        echo '<br><br><a href="carrito.php">Vaciar</a>';


    }else{
        echo "<script>alert('El carro esta vacio');</script>";
        ?>
        <a href="index.php">Regresar</a>
        <?php
    }
    if(isset($_REQUEST["vaciar"])){
        session_destroy();
        header("Location:carrito.php");
    }
    if(isset($_REQUEST["producto"])){
        $producto=$_REQUEST["producto"];
        unset($_SESSION["carrito"][$producto]);
        echo "<script>alert('Se elimino el producto: $producto');</script>";
        header("Location:carrito.php");
    }
?>