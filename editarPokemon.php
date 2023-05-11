<?php
$id=$_GET["id"];
function editarPokemon($nombre, $tipo, $numero, $imagen, $descripcion, $id){

    require_once ('dataBase.php');
    $query= $conexion->prepare("UPDATE pokemones
                                SET nombre = ?, tipo = ?, numero= ?, imagen= ?, descripcion= ?
                                WHERE id=?");
    $query->bind_param('ssissi', $nombre, $tipo, $numero, $imagen, $descripcion, $id);
    $query->execute();
    $conexion->close();
}

if(isset($_POST["enviar"])){
    $nombre=$_POST["nombre"];
    $tipo=$_POST["tipo"];
    $numero=$_POST["numero"];
    $imagen=basename($_FILES['imagen']['name']);
    $descripcion=$_POST["descripcion"];
    editarPokemon($nombre, $tipo, $numero, $imagen, $descripcion, $id);

    $rutaImagen= "./imagenes/" . $imagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
</head>
<body>
<form method="post" action="editarPokemon.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <label for="nombre">Nuevo Nombre</label>
    <input required type="text" name="nombre" >
    <br>
    <label>
        <input type="radio" name="tipo" value="fuego">
        Fuego
    </label>
    <label>
        <input type="radio" name="tipo" value="agua">
        Agua
    </label>
    <label>
        <input type="radio" name="tipo" value="planta">
        Planta
    </label>
    <br>
    <label for="numero">Nuevo numero</label>
    <input required type="number" name="numero">
    <br>
    <label for="imagen">Nueva imagen</label>
    <input required type="file" name="imagen" id="imagen">
    <br>
    <label for="descripcion">Nueva descripcion</label>
    <input required type="text" name="descripcion">
    <br>
    <button type="submit" name="enviar">Enviar</button>

</form>

<br>
<a href="index.php">Volver al inicio</a>

</body>
</html>