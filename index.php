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
    <h1>Pokedex</h1>
    <form>
        <input type=text name="ususario" placeholder="usuario">
        <input type=text name="password" placeholder="contraseña">
        <input type="submit" name="" value="Ingresar">
    </form>
</header>
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
            <th>nombre</th>
            <th>tipo</th>
            <th>numero</th>
            <th>imagen</th>
            <th>descripcion</th>
            <th>editar</th>
        </tr>
        </thead>
        <tbody>

        <?php
            $valores= $conexion->query("SELECT * FROM pokemones");
            //$valores= $query->fetch_assoc();


        foreach ($valores as $pokemon) {
            ?><tr>
                <td><?php echo $pokemon['nombre']; ?> </td>
                <td><img width="25px" height="25px" src="imagenes/<?php echo $pokemon['tipo'];?>.png"> </td>
                <td><?php echo $pokemon['numero']; ?> </td>
                <td><img width="35px" height="35px" src="imagenes/<?php echo $pokemon['imagen'];?>"> </td>
                <td><?php echo $pokemon['descripcion']; ?> </td>
                 <td> <a href="./editarPokemon.php?id=<?php echo $pokemon['id']; ?>">editar</a> <a href="./eliminarPokemon.php?id=<?php echo $pokemon['id']; ?>">eliminar</a> </td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
    </div>
</section>
<section>
    <div>
        <p>
            <a href="agregarPokemon.php">Agregar Pokemon</a>
        </p>
    </div>

</section>

</body>
</html>

