<?php require('views/header.php'); ?>
<h1>Tiendas</h1>
<?php if(isset($mensaje)):$app->alerta($tipo,$mensaje);endif; ?>
<a href="tienda.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Opciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tiendas as $tienda): ?>
    <tr>
        <th scope="row"><?php echo $tienda['id_tienda']; ?></th>
        <td><?php echo $tienda['tienda']; ?></td>
        <td><?php echo $tienda['direccion']; ?></td>
        <td><?php echo $tienda['telefono']; ?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="tienda.php?accion=actualizar&id=<?php echo $tienda['id_tienda']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="tienda.php?accion=eliminar&id=<?php echo $tienda['id_tienda']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
