<?php require('views/header.php'); ?>
<h1>Inventario de Prendas</h1>
<?php if(isset($mensaje)):$app->alerta($tipo,$mensaje);endif; ?>
<a href="tienda.php?accion=crear" class="btn btn-success">Nueva Prenda</a>
<table class="table">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoría</th>
        <th scope="col">Color</th>
        <th scope="col">Talla</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Opciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tiendas as $tienda): ?>
    <tr>
        <th scope="row"><?php echo $tienda['id_tienda']; ?></th>
        <td><?php echo $tienda['nombre_prenda']; ?></td>
        <td><?php echo $tienda['categoria']; ?></td>
        <td><?php echo $tienda['color']; ?></td>
        <td><?php echo $tienda['talla']; ?></td>
        <td><?php echo $tienda['precio']; ?></td>
        <td><?php echo $tienda['stock']; ?></td>
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
