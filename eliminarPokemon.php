<?php
include_once ("header.php");
if(!isset($_SESSION["logueado"]) && !$_SESSION["logueado"])
{
    header("Location:index.php");
    exit();
}?>

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


