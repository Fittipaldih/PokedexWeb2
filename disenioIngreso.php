<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg  ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/pokedex-ok.png" alt="logo" width="700" height="110">
            </a>
        </div>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h1>Usuario</h1>
            </div>
        </div>
    </nav>
    <br>
    <div class="container-fluid">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Ingrese el nombre, tipo o numero de pokemon" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>
    <br>
    <div class="container-fluid">
    <table class="table table-bordered border-danger">
        <thead>
        <tr>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><img src="img/025.png" alt="logo" width="100" height="100"></td>
            <td><img src="img/Electricidad.png" alt="logo" width="200" height="100"></td>
            <td>025</td>
            <td>Pikachu</td>
            <td><button type="button" class="btn btn-outline-primary">Modificaciones</button> <button type="button" class="btn btn-outline-danger">Baja</button></td>
        </tr>
        <tr>
            <td><img src="img/025.png" alt="logo" width="100" height="100"></td>
            <td><img src="img/Electricidad.png" alt="logo" width="200" height="100"></td>
            <td>025</td>
            <td>Pikachu</td>
            <td><button type="button" class="btn btn-outline-primary">Modificaciones</button> <button type="button" class="btn btn-outline-danger">Baja</button></td>
        </tr>
        <tr>
            <td><img src="img/025.png" alt="logo" width="100" height="100"></td>
            <td><img src="img/Electricidad.png" alt="logo" width="200" height="100"></td>
            <td>025</td>
            <td>Pikachu</td>
            <td><button type="button" class="btn btn-outline-primary">Modificaciones</button> <button type="button" class="btn btn-outline-danger">Baja</button></td>
        </tr>
        <tr>
            <td><img src="img/025.png" alt="logo" width="100" height="100"></td>
            <td><img src="img/Electricidad.png" alt="logo" width="200" height="100"></td>
            <td>025</td>
            <td>Pikachu</td>
            <td><button type="button" class="btn btn-outline-primary">Modificaciones</button> <button type="button" class="btn btn-outline-danger">Baja</button></td>
        </tr>

        </tbody>
    </table>
        <br>
        <div class="d-grid">
            <button type="button" class="btn btn-outline-success btn-block">Nuevo Pokemon</button>
        </div>
        <br>
    </div>


</body>
</html>