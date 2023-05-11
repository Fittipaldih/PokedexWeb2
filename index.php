<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
</head>
<body>
<header>
    <?php
    session_start();
    if(isset($_SESSION["logueado"]) && $_SESSION["logueado"])
    {
        echo "<h3> Hola ".$_SESSION["nombre"]."<h3>";
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
<h1>Pokedex</h1>
<section>
    <?php
    if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]){
        echo '<form action="alta.php" method="get" enctype="application/x-www-form-urlencoded">    
        <input type="submit" value="Nuevo Pokemon">    
        </form>';
    }
    ?>
</section>
</body>
</html>