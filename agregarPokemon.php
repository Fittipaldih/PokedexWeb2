<?php
    session_start();
    var_dump($_SESSION);
    if(!isset($_SESSION["logueado"])){
        header("location:index.php");
    }
?>




<?php



function insertarPokemon($nombre, $tipo, $numero, $imagen, $descripcion){
    require_once ('dataBase.php');
    $query= $conexion->prepare("INSERT INTO pokemones VALUES (' ',?,?,?,?,?)");
    $query->bind_param('issss', $numero, $tipo, $nombre, $descripcion, $imagen);
    $query->execute();
    $conexion->close();
}

if(isset($_POST["enviar"])){
    $nombre=$_POST["nombre"];
    $tipo=$_POST["tipo"];
    $numero=$_POST["numero"];
    $imagen=basename($_FILES['imagen']['name']);
    $descripcion=$_POST["descripcion"];
    insertarPokemon($nombre, $tipo, $numero, $imagen, $descripcion);

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
    <form method="post" action="agregarPokemon.php" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
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
        <label for="numero">numero</label>
        <input required type="number" name="numero">
        <br>
        <label for="imagen">imagen</label>
        <input required type="file" name="imagen" id="imagen">
        <br>
        <label for="descripcion">descripcion</label>
        <input required type="text" name="descripcion">
        <br>
        <button type="submit" name="enviar">Enviar</button>

    </form>

    <br>
    <a href="index.php">Volver al inicio</a>

</body>
</html>
