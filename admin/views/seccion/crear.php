<?php require('views/header.php') ?>
<h1><?php if($accion=="crear"):echo('Nueva');else:echo('Modificar');endif; ?> Prenda</h1>
<form method="post" action="ropa_tienda.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id=' . $ropa_tienda['id_ropa_tienda']);endif;?>">
    
    <div class="mb-3">
        <label for="nombre_prenda" class="form-label">Nombre de la Prenda</label>
        <input class="form-control" type="text" name="data[nombre_prenda]" placeholder="Escribe aquí el nombre de la prenda" id="nombre_prenda"
        value="<?php if(isset($ropa_tienda['nombre_prenda'])):echo($ropa_tienda['nombre_prenda']);endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <input class="form-control" type="text" name="data[categoria]" placeholder="Escribe aquí la categoría" id="categoria"
        value="<?php if(isset($ropa_tienda['categoria'])):echo($ropa_tienda['categoria']);endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input class="form-control" type="text" name="data[color]" placeholder="Escribe aquí el color" id="color"
        value="<?php if(isset($ropa_tienda['color'])):echo($ropa_tienda['color']);endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="talla" class="form-label">Talla</label>
        <input class="form-control" type="text" name="data[talla]" placeholder="Escribe aquí la talla" id="talla"
        value="<?php if(isset($ropa_tienda['talla'])):echo($ropa_tienda['talla']);endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input class="form-control" type="number" step="0.01" name="data[precio]" placeholder="Escribe aquí el precio" id="precio"
        value="<?php if(isset($ropa_tienda['precio'])):echo($ropa_tienda['precio']);endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input class="form-control" type="number" name="data[stock]" placeholder="Escribe aquí el stock disponible" id="stock"
        value="<?php if(isset($ropa_tienda['stock'])):echo($ropa_tienda['stock']);endif; ?>"/>
    </div>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>
<?php require('views/footer.php') ?>
