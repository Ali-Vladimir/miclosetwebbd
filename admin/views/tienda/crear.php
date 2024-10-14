<?php require('views/header.php') ?>
<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo('Modificar'); endif; ?> Prenda</h1>
<form method="post" action="tienda.php?accion=<?php if($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $tiendas['id_tienda']); endif; ?>">
    <div class="mb-3">
        <label for="tienda" class="form-label">Nombre de la Tienda</label>
        <input class="form-control" type="text" name="data[tienda]" placeholder="Escribe el nombre de la tienda" id="tienda"
        value="<?php if(isset($tiendas['tienda'])): echo($tiendas['tienda']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input class="form-control" type="text" name="data[direccion]" placeholder="Escribe la direccion" id="direccion"
        value="<?php if(isset($tiendas['direccion'])): echo($tiendas['direccion']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input class="form-control" type="text" name="data[telefono]" placeholder="Escribe el Telefono" id="telefono"
        value="<?php if(isset($tiendas['telefono'])): echo($tiendas['telefono']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>
<?php require('views/footer.php') ?>
