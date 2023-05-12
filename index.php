<?php
 require "dataBase.php"

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<header>
    <?php
    include_once("header.php");
    ?>
</header>

<section class="container-fluid ">
    <form action="index.php" method="get">
        <div class="row ">
            <div class="col">
                <input type="text" name="pokemonBuscado" placeholder="Ingrese un nombre" class="form-control">
            </div>
            <div class="col">
                <input type="submit" value="Buscar Pokemón" class="btn btn-outline-danger">
            </div>
        </div>
    </form>
</section>
<section>
    <br>
    <section>
        <div class="container-fluid">
            <table class="table table-bordered border-danger">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Numero</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <?php
                    if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]){
                        echo "<th>Modificar</th>";
                    }
                    ?>
                </tr>
                </thead>
                <tbody>

                <?php

                if (!isset($_GET["pokemonBuscado"])){
                    mostrarTodosLosPokemones();

                } else{
                    buscarPokemon($_GET["pokemonBuscado"]);
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>
    <section class="container-fluid">
        <?php
        if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]){
            echo '<form action="agregarPokemon.php" method="get" enctype="application/x-www-form-urlencoded">    
                <input type="submit" value="Nuevo Pokemon" class="btn btn-outline-danger">    
                </form>';
        }
        ?>

    </section>

</body>


</html>

<?php
function buscarPokemon($pokemonBuscado)
{   include ("dataBase.php");
    $sql = "SELECT * FROM pokemones WHERE `nombre` like '%" . $pokemonBuscado . "%'";
    $result = $conexion->query($sql);
    $resultado = $result->fetch_all(MYSQLI_ASSOC);
    if (mysqli_num_rows($result) > 0) {
        return mostrarResultado($resultado);
    }else {
        echo "<div><p class='h3'>No se encontraron resultados</p></div>";
        echo mostrarTodosLosPokemones();
    }
}
function mostrarResultado($resultado)
{
    foreach ($resultado as $pokemon) {
        echo "<tr>
              <td>
                  <a href='/PokedexWeb2/detalle.php?id=" . $pokemon["idPokemon"] . "'>" . $pokemon['nombre'] . "</a>
                    </td>
                    <td><img width='25px' height='25px' src='imagenes/" . $pokemon['tipo'] . ".png'> </td>
                    <td>" . $pokemon['numero'] . "</td>
                    <td><img width='35px' height='35px' src='imagenes/" . $pokemon['imagen'] . "'> </td>
                    <td>" . $pokemon['descripcion'] . "</td>";
        if (isset($_SESSION["logueado"]) && $_SESSION["logueado"]) {
            echo '<td> 
                                    <a href="/PokedexWeb2/editarPokemon.php?id=' . $pokemon['idPokemon'] . '" class="btn btn-outline-primary">Editar</a>
                                    <a href="/PokedexWeb2/eliminarPokemon.php?id=' . $pokemon['idPokemon'] . '" class="btn btn-outline-danger">Eliminar</a>
                                    </td>';
        }
        echo '
                    </tr>';
    }
}

function mostrarTodosLosPokemones()
{
    include ("dataBase.php");
    $valores= $conexion->query("SELECT * FROM pokemones");

    foreach ($valores as $pokemon) {
        ?><tr>
        <td><?php
            echo '<a href="/PokedexWeb2/detalle.php?id='.$pokemon["idPokemon"].'">'. $pokemon['nombre'].'</a>';
            ?> </td>
        <td><img width="25px" height="25px" src="imagenes/<?php echo $pokemon['tipo'];?>.png"> </td>
        <td><?php echo $pokemon['numero']; ?> </td>
        <td><img width="35px" height="35px" src="imagenes/<?php echo $pokemon['imagen'];?>"> </td>
        <td><?php echo $pokemon['descripcion']; ?> </td>
        <?php
        if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]){
            echo '<td> 
                                    <a href="/PokedexWeb2/editarPokemon.php?id='.$pokemon['idPokemon']. '" class="btn btn-outline-primary">Editar</a>
                                    <a href="/PokedexWeb2/eliminarPokemon.php?id='. $pokemon['idPokemon'].'" class="btn btn-outline-danger">Eliminar</a>
                                    </td>';
        }
        ?>
        </tr>
        <?php
    }
}
