<?php
session_start();
var_dump($_SESSION);
if(!isset($_SESSION["logueado"])){
    header("location:index.php");
}
?>


<?php

$id = $_GET["id"];
function eliminarPokemon($id)
{

    require_once('dataBase.php');
    $query = $conexion->prepare("DELETE FROM pokemones
                                 WHERE idPokemon = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $conexion->close();

    header("Location:index.php");

}

    eliminarPokemon($id);


