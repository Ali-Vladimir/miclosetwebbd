<?php require('views/header.php'); ?>
<h1>Pedidos</h1>
<?php if(isset($mensaje)):$app->alerta($tipo,$mensaje);endif; ?>
<a href="pedidos.php?accion=crear" class="btn btn-success">Nuevo Pedido</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ID Usuario</th>
            <th scope="col">Fecha Pedido</th>
            <th scope="col">Estado</th>
            <th scope="col">Dirección de Envío</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <th scope="row"><?php echo $pedido['id_pedido']; ?></th>
            <td><?php echo $pedido['id_usuario']; ?></td>
            <td><?php echo $pedido['fecha_pedido']; ?></td>
            <td><?php echo $pedido['estado_pedido']; ?></td>
            <td><?php echo $pedido['direccion_envio']; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Opciones">
                    <a href="pedidos.php?accion=actualizar&id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-warning">Actualizar</a>
                    <a href="pedidos.php?accion=eliminar&id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require('views/footer.php'); ?>
