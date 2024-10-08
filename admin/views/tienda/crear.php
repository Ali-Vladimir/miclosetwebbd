<?php require('views/header.php') ?>
<h1><?php if($accion == "crear"): echo('Nueva'); else: echo('Modificar'); endif; ?> Prenda</h1>
<form method="post" action="tienda.php?accion=<?php if($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $tienda['id_tienda']); endif; ?>">
    <div class="mb-3">
        <label for="nombre_prenda" class="form-label">Nombre de la Prenda</label>
        <input class="form-control" type="text" name="data[nombre_prenda]" placeholder="Escribe el nombre de la prenda" id="nombre_prenda"
        value="<?php if(isset($tienda['nombre_prenda'])): echo($tienda['nombre_prenda']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <input class="form-control" type="text" name="data[categoria]" placeholder="Escribe la categoría" id="categoria"
        value="<?php if(isset($tienda['categoria'])): echo($tienda['categoria']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input class="form-control" type="text" name="data[color]" placeholder="Escribe el color" id="color"
        value="<?php if(isset($tienda['color'])): echo($tienda['color']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="talla" class="form-label">Talla</label>
        <input class="form-control" type="text" name="data[talla]" placeholder="Escribe la talla" id="talla"
        value="<?php if(isset($tienda['talla'])): echo($tienda['talla']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input class="form-control" type="number" step="0.01" name="data[precio]" placeholder="Escribe el precio" id="precio"
        value="<?php if(isset($tienda['precio'])): echo($tienda['precio']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input class="form-control" type="number" name="data[stock]" placeholder="Escribe la cantidad en stock" id="stock"
        value="<?php if(isset($tienda['stock'])): echo($tienda['stock']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>
<?php require('views/footer.php') ?>
