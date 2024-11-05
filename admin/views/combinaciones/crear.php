<?php require('views/header.php'); ?>

<h1><?php echo ($accion == "crear") ? 'Nueva' : 'Modificar'; ?> Combinación</h1>

<form method="post" action="combinaciones.php?accion=<?php echo ($accion == "crear") ? 'nuevo' : 'modificar&id=' . $combinacionActual['id_combinacion']; ?>">
    <div class="mb-3">
        <label for="id_usuario" class="form-label">ID del Usuario</label>
        <input class="form-control" type="number" name="data[id_usuario]" placeholder="ID del Usuario" id="id_usuario"
        value="<?php echo isset($combinacionActual['id_usuario']) ? $combinacionActual['id_usuario'] : ''; ?>" />
    </div>

    <div class="mb-3">
        <label for="nombre_combinacion" class="form-label">Nombre de la Combinación</label>
        <input class="form-control" type="text" name="data[nombre_combinacion]" placeholder="Nombre de la Combinación" id="nombre_combinacion"
        value="<?php echo isset($combinacionActual['nombre_combinacion']) ? $combinacionActual['nombre_combinacion'] : ''; ?>" />
    </div>

    <div class="mb-3">
        <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
        <input class="form-control" type="date" name="data[fecha_creacion]" id="fecha_creacion"
        value="<?php echo isset($combinacionActual['fecha_creacion']) ? $combinacionActual['fecha_creacion'] : ''; ?>" />
    </div>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>

<?php require('views/footer.php'); ?>
