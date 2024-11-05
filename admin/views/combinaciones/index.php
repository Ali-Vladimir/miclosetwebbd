<?php require('views/header.php'); ?>

<h1>Combinaciones</h1>

<?php if(isset($mensaje)):$app->alerta($tipo, $mensaje); endif; ?>
<a href="combinaciones.php?accion=crear" class="btn btn-success">Nueva Combinación</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre de la Combinación</th>
            <th scope="col">Fecha de Creación</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($combinaciones as $combinacion): ?>
            <tr>
                <th scope="row"><?php echo $combinacion['id_combinacion']; ?></th>
                <td><?php echo $combinacion['id_usuario']; ?></td>
                <td><?php echo $combinacion['nombre_combinacion']; ?></td>
                <td><?php echo $combinacion['fecha_creacion']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Opciones">
                        <a href="combinaciones.php?accion=actualizar&id=<?php echo $combinacion['id_combinacion']; ?>" class="btn btn-warning">Actualizar</a>
                        <a href="combinaciones.php?accion=eliminar&id=<?php echo $combinacion['id_combinacion']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
