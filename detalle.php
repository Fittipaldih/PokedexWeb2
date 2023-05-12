<?php
include_once("dataBase.php");

if ($_GET["id"] == "") {
    header("Location: index.php");
    exit();
}

$pokemonSolicitado = $_GET["id"];

$sql = "SELECT * FROM pokemones WHERE `idPokemon` = " . $pokemonSolicitado;
$result = $conexion->query($sql);
$resultado = $result->fetch_all(MYSQLI_ASSOC);
$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php
    include_once ("header.php");
    ?>
    <br>

    <div class="container d-flex justify-content-center">
        <div class="row ">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php
                        echo   '<img class="img-fluid rounded-start" src="imagenes/' . $resultado[0]["imagen"] . '">';
                        ?>
                        </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card-tittle row">
                                <div class="col-1">
                                    <?php
                                    echo '<img width="20" height="20" src="imagenes/'.$resultado[0]["tipo"].'.png">';
                                    ?>
                                </div>
                                <div class="col-11">
                                    <?php
                                    echo '<h5>'.$resultado[0]["nombre"].'</h5>';
                                    ?>
                                </div>
                            </div>
                            <?php
                            echo '<p class="card-text">'. $resultado[0]["descripcion"].'</p>';

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php


