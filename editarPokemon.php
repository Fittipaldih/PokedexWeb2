<?php
include_once ("header.php");
if(!isset($_SESSION["logueado"]) && !$_SESSION["logueado"])
{
    header("Location:index.php");
    exit();
}?>


<?php
$id=$_GET["id"];
function editarPokemon($nombre, $tipo, $numero, $imagen, $descripcion, $id){

    require_once ('dataBase.php');
    $query= $conexion->prepare("UPDATE pokemones
                                SET nombre = ?, tipo = ?, numero= ?, imagen= ?, descripcion= ?
                                WHERE idPokemon=?");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<header>
    <?php
    include_once ("header.php");
    ?>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<div class="d-flex justify-content-center">
    <form class="mx-auto" method="post" action="editarPokemon.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nuevo nombre:</label>
            <input required type="text" class="form-control mb-4" name="nombre">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo: </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" value="fuego" id="tipoFuego">
                <label class="form-check-label" for="tipoFuego">Fuego</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" value="agua" id="tipoAgua">
                <label class="form-check-label" for="tipoAgua">Agua</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" value="planta" id="tipoPlanta">
                <label class="form-check-label" for="tipoPlanta">Planta</label>
            </div>
        </div>
        <div class="form-group">
            <label for="numero">Nuevo número:</label>
            <input required type="number" class="form-control mb-4" name="numero">
        </div>
        <div class="form-group">
            <label for="imagen">Nueva imagen:</label>
            <div class="input-group mb-4">
                <input required type="file" class="form-control" name="imagen" id="imagen">
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion">Nueva descripción</label>
            <input required type="text" class="form-control mb-4" name="descripcion">
        </div>
        <button type="submit" class="btn btn-danger btn-block" name="enviar">Enviar</button>
        <a href="index.php" class="btn btn-danger btn-block">Volver al inicio</a>
    </form>
</div>
</body>
</html>