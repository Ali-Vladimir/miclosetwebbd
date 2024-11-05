<?php require('views/header.php'); ?>
<h1>Prendas</h1>

<?php if(isset($mensaje)):$app->alerta($tipo,$mensaje);endif; ?>

<a href="ropa_tienda.php?accion=crear" class="btn btn-success">Nueva Prenda</a>

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
        <?php foreach ($ropas as $ropa): ?>
        <tr>
            <th scope="row"><?php echo $ropa['id_ropa_tienda']; ?></th>
            <td><?php echo $ropa['nombre_prenda']; ?></td>
            <td><?php echo $ropa['categoria']; ?></td>
            <td><?php echo $ropa['color']; ?></td>
            <td><?php echo $ropa['talla']; ?></td>
            <td><?php echo $ropa['precio']; ?></td>
            <td><?php echo $ropa['stock']; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <a href="ropa_tienda.php?accion=actualizar&id=<?php echo $ropa['id_ropa_tienda']; ?>" class="btn btn-warning">Actualizar</a>
                    <a href="ropa_tienda.php?accion=eliminar&id=<?php echo $ropa['id_ropa_tienda']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
