<?php
include_once ("dataBase.php");

$database = new Database();

$numero = $_GET["numero"];
$nombre= $_GET["nombre"];
$imagen= $_FILES["imagen"];
$imagenTxt = $_GET["imagen_txt"];
$tipo= $_GET["tipo"];
$descripcion= $_GET["descripcion"];
$nro= $_GET["nro"];

if (isset($_GET["registrar"])) {
    $page = "alta.php?mensaje=no se pudo registrar pokemon";
    move_uploaded_file($_FILES["imagen"]["tmp_name"], "imagenes/" . $_FILES["imagen"]["name"]);

    $sql = "INSERT INTO pokemon (numero, nombre, imagen, tipo, descripcion)
    VALUES (" . $numero .
        ",'" . $nombre .
        "','" . $_FILES["imagen"]["name"] .
        "','" . $tipo .
        "','" . $descripcion . "')";
    ejecutar($sql, $database, $page);
}

elseif (isset($_GET["modificar"])) {
    $page = "update.php?modificacion=Modificacion&numero=" . $nro . "&mensaje=no se pudo modificar pokemon";

    if (!empty($_FILES["imagen"]["tmp_name"]))
    {
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "imagenes/" . $_FILES["imagen"]["name"]);
        $imagen = $_FILES["imagen"]["name"];
    }else
    {
        $imagen = $imagenTxt;
    }


    $sql = "UPDATE pokemon 
            SET numero=" . $numero . ",
             nombre='" . $nombre . "',
             tipo='" . $tipo . "',
             imagen='".$imagen."', 
             descripcion='" . $descripcion . "' 
             WHERE numero=" . $nro;

    ejecutar($sql, $database, $page);
}
function ejecutar($sql, $database, $page){
    try {
        $database->execute($sql);
        header("location:index.php");
        exit();
    } catch (Exception $e) {
        header("location:" . $page);
        exit();
    }
}
?>
