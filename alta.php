<div>
    <form action="registrar.php" method="GET">
        <input type="number" id="numero" name="numero" placeholder="numero">
        <input type="text" id="nombre" name="nombre" placeholder="nombre">
        <input type="file" id="imagen" name="imagen" placeholder="imagen">
        <select name="tipo">
            <option value="default" selected>seleccione un tipo</option>
            <option value="agua.png" >agua</option>
            <option value="fuego.png">fuego</option>
            <option value="tierra.png">tierra</option>
            <option value="veneno.png">veneno</option>
        </select>
        <textarea name="descripcion" id="descripcion" rows="3" placeholder="descripcion"></textarea>
        <input type='submit' name='registrar' value='registrar'>
        <?php
        $mensaje="";
        if(isset($_GET['mensaje'])){
            $mensaje= $_GET['mensaje'];
            echo '<span>' . $mensaje . '<span>';
        }
        ?>
    </form>
    </div>