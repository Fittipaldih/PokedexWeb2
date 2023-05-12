<nav class="navbar navbar-expand-sm navbar-dark bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="imagenes/user.png"></a>
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