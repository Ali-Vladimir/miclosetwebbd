<?php require('views/header.php') ?>
<h1><?php if($accion == "crear"): echo('Nueva'); else: echo('Modificar'); endif; ?> Prenda de Usuario</h1>
<form method="post" action="ropa_usuario.php?accion=<?php if($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $prendas['id_ropa_usuario']); endif; ?>">

    <div class="mb-3">
        <label for="id_usuario" class="form-label">ID de Usuario</label>
        <input class="form-control" type="text" name="data[id_usuario]" placeholder="Escribe el ID del usuario" id="id_usuario"
        value="<?php if(isset($prendas['id_usuario'])): echo($prendas['id_usuario']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="nombre_prenda" class="form-label">Nombre de la Prenda</label>
        <input class="form-control" type="text" name="data[nombre_prenda]" placeholder="Escribe el nombre de la prenda" id="nombre_prenda"
        value="<?php if(isset($prendas['nombre_prenda'])): echo($prendas['nombre_prenda']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <input class="form-control" type="text" name="data[categoria]" placeholder="Escribe la categoría" id="categoria"
        value="<?php if(isset($prendas['categoria'])): echo($prendas['categoria']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input class="form-control" type="text" name="data[color]" placeholder="Escribe el color" id="color"
        value="<?php if(isset($prendas['color'])): echo($prendas['color']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="talla" class="form-label">Talla</label>
        <input class="form-control" type="text" name="data[talla]" placeholder="Escribe la talla" id="talla"
        value="<?php if(isset($prendas['talla'])): echo($prendas['talla']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input class="form-control" type="text" name="data[estado]" placeholder="Escribe el estado (Nuevo/Usado)" id="estado"
        value="<?php if(isset($prendas['estado'])): echo($prendas['estado']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="imagen_url" class="form-label">URL de la Imagen</label>
        <input class="form-control" type="text" name="data[imagen_url]" placeholder="Escribe la URL de la imagen" id="imagen_url"
        value="<?php if(isset($prendas['imagen_url'])): echo($prendas['imagen_url']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>
<?php require('views/footer.php') ?>
