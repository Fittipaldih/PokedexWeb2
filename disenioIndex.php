<?php
 require_once "dataBase.php"

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
        <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void(0)"><img src="imagenes/user.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <?php
                    session_start();
                    if(isset($_SESSION["logueado"]) && $_SESSION["logueado"])
                    {
                        echo '<div>
                                <h3> Hola '.$_SESSION["usuario"].'<h3>
                                <form action="logout.php" >
                        <button type="submit" class="btn btn-outline-light text-dark ">Cerrar sesión</button>
                       </form>
                            </div>';
                        }
                    else{
                        echo '<div>
                            <form action="loginProcesar.php" method="get" enctype="application/x-www-form-urlencoded">
                                <div class="row">
                                     <div class="col">
                                     <input type="text" placeholder="Usuario" name="usuario" class="form-control">
                                    </div>
                                    <div class="col">
                                <input type="password" placeholder="Contraseña" name="password" class="form-control">
                                </div>
                                <div class="col">
                                <input type="submit" value="Ingresar"  class="btn btn-outline-light text-dark">
                                </div>
                            </form>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </nav>


        <br>

        </header>
        <section class="container-fluid ">
            <form>
                <div class="row ">
                    <div class="col">
                    <input type="search" placeholder="Ingrese un nombre" class="form-control">
                     </div>
                    <div class="col">
                    <input type="submit" value="Buscar Pokemón" class="btn btn-outline-danger">
                    </div>
                </div>
            </form>
            </section>
        <section>

        <!--<style>
            table {
                border-collapse: collapse;
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid black;
            }
            th {
                background-color: #ccc;
            }
        </style>-->
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
                        $valores= $conexion->query("SELECT * FROM pokemones");
                        //$valores= $query->fetch_assoc();


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
                                    <a href="/PokedexWeb2/editarPokemon.php?id='.$pokemon['idPokemon']. '" class="btn btn-outline-primary">editar</a>
                                    <a href="/PokedexWeb2/eliminarPokemon.php?id='. $pokemon['idPokemon'].'" class="btn btn-outline-danger">eliminar</a>
                                    </td>';
                        }
                        ?>
                        </tr>
                        <?php
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
