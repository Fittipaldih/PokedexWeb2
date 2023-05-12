<?php

include_once("dataBase.php");

$pokemonBuscado = $_GET['pokemonBuscado'];

$sql = "SELECT * FROM pokemones WHERE `nombre` like '" . $pokemonBuscado."'";
$result = $conexion->query($sql);
$resultado = $result->fetch_all(MYSQLI_ASSOC);
$conexion->close();

if(!empty($pokemonBuscado)){
    $idPokemon=devolverId($resultado);
    header('location:detalle.php?id='.$idPokemon);
    exit();
}
if(empty($nombre)){
    header('location:index.php');
    exit();
}

function devolverId($resultado)
{
    foreach ($resultado as $element){
       return $element["idPokemon"];
}
}