<?php
 require_once "dataBase.php"

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pokedex</title>


    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg  ">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="imagenes/logoPokedex.png" alt="logo" width="700" height="110">
                    </a>
                </div>
            </nav>

            <?php
            session_start();
            if(isset($_SESSION["logueado"]) && $_SESSION["logueado"])
            {
                echo "<h3> Hola ".$_SESSION["usuario"]."<h3>";
            }else{
                echo '<div>
                            <form action="loginProcesar.php" method="get" enctype="application/x-www-form-urlencoded">
                                <input type="text" placeholder="Usuario" name="usuario">
                                <input type="password" placeholder="Contraseña" name="password">
                                <input type="submit" value="Ingresar">
                            </form>
                        </div>';
            }
            ?>
        </header>
        <section>
            <form>
                <input type="search" placeholder="Ingrese un nombre">
                <input type="submit" value="Buscar Pokemón">
            </form>
            </section>
        <section>

        <style>
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
        </style>
        <section>
            <div>
                <table>
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
                                    <a href="/PokedexWeb2/editarPokemon.php?id='.$pokemon['idPokemon']. '">editar</a>
                                    <a href="/PokedexWeb2/eliminarPokemon.php?id='. $pokemon['idPokemon'].'">eliminar</a>
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
        <section>
            <?php
            if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]){
                echo '<form action="agregarPokemon.php" method="get" enctype="application/x-www-form-urlencoded">    
                <input type="submit" value="Nuevo Pokemon">    
                </form>';
            }
            ?>

        </section>
    </body>

</html>
