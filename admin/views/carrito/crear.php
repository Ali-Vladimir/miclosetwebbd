<?php require('views/header.php'); ?>

<h1><?php echo $accion == "crear" ? 'Nuevo' : 'Modificar'; ?> Carrito</h1>

<form method="post" action="carrito.php?accion=<?php echo $accion == "crear" ? 'nuevo' : 'modificar&id=' . $carritoActual['id_carrito']; ?>">
    <div class="mb-3">
        <label for="id_usuario" class="form-label">ID Usuario</label>
        <input class="form-control" type="number" name="data[id_usuario]" placeholder="Ingresa el ID del usuario" id="id_usuario"
        value="<?php echo isset($carritoActual['id_usuario']) ? $carritoActual['id_usuario'] : ''; ?>" required />
    </div>

    <?php if ($accion == "crear"): ?>
    <div class="mb-3">
        <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
        <input class="form-control" type="date" name="data[fecha_creacion]" placeholder="Selecciona la fecha de creación" id="fecha_creacion"
        value="<?php echo isset($carritoActual['fecha_creacion']) ? $carritoActual['fecha_creacion'] : ''; ?>" required />
    </div>
    <?php endif; ?>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>

<?php require('views/footer.php'); ?>
