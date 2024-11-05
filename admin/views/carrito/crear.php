<?php require('views/header.php'); ?>

<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo('Modificar'); endif; ?> Carrito</h1>

<form method="post" action="carrito.php?accion=<?php if($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $carritoActual['id_carrito']); endif; ?>">
    <div class="mb-3">
        <label for="id_usuario" class="form-label">ID Usuario</label>
        <input class="form-control" type="number" name="data[id_usuario]" placeholder="Ingresa el ID del usuario" id="id_usuario"
        value="<?php if(isset($carritoActual['id_usuario'])): echo($carritoActual['id_usuario']); endif; ?>" required />
    </div>

    <div class="mb-3">
        <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
        <input class="form-control" type="date" name="data[fecha_creacion]" placeholder="Selecciona la fecha de creación" id="fecha_creacion"
        value="<?php if(isset($carritoActual['fecha_creacion'])): echo($carritoActual['fecha_creacion']); endif; ?>" required />
    </div>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>

<?php require('views/footer.php'); ?>
