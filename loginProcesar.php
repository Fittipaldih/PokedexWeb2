<?php
session_start();
include_once ("dataBase.php");

if (isset($_GET['usuario']) && isset($_GET['password'])) {
    $usuario = $_GET["usuario"];
    $clave = $_GET["password"];

    $sql = "SELECT * FROM usuario WHERE nombre = '$usuario' AND clave = '$clave'";

    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION["logueado"]= true;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["clave"] = $clave;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION["logueado"]= false;
        header("location:index.php");
        exit();
    }

    mysqli_close($conexion);
}
?>
