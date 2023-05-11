<?php

$id = $_GET["id"];
function eliminarPokemon($id)
{

    require_once('dataBase.php');
    $query = $conexion->prepare("DELETE FROM pokemones
                                 WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $conexion->close();
    echo "Pokemon con id " . $id . " eliminanado correctamente" ;

}
    eliminarPokemon($id);
?>
<br>
<br>
<a href="index.php">Volver al inicio</a>
