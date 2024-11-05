<?php require('views/header.php'); ?>
<h1>Carritos</h1>

<?php if(isset($mensaje)): $app->alerta($tipo, $mensaje); endif; ?>
<a href="carrito.php?accion=crear" class="btn btn-success">Nuevo Carrito</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Carrito</th>
            <th scope="col">ID Usuario</th>
            <th scope="col">Fecha de Creación</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($carritos as $carrito): ?>
        <tr>
            <th scope="row"><?php echo $carrito['id_carrito']; ?></th>
            <td><?php echo $carrito['id_usuario']; ?></td>
            <td><?php echo $carrito['fecha_creacion']; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Opciones">
                    <a href="carrito.php?accion=actualizar&id=<?php echo $carrito['id_carrito']; ?>" class="btn btn-warning">Actualizar</a>
                    <a href="carrito.php?accion=eliminar&id=<?php echo $carrito['id_carrito']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
