<?php require('views/header.php'); ?>
<h1>Inventario de Ropa</h1>
<?php if(isset($mensaje)):$app->alerta($tipo,$mensaje);endif; ?>
<a href="tienda.php?accion=crear" class="btn btn-success">Agregar Nueva Prenda</a>
<table class="table">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre de Prenda</th>
        <th scope="col">Categoría</th>
        <th scope="col">Color</th>
        <th scope="col">Talla</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tienda as $prenda): ?>
    <tr>
        <th scope="row"><?php echo $prenda['id_tienda']; ?></th>
        <td><?php echo $prenda['nombre_prenda']; ?></td>
        <td><?php echo $prenda['categoria']; ?></td>
        <td><?php echo $prenda['color']; ?></td>
        <td><?php echo $prenda['talla']; ?></td>
        <td><?php echo $prenda['precio']; ?></td>
        <td><?php echo $prenda['stock']; ?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="tienda.php?accion=actualizar&id=<?php echo $prenda['id_tienda']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="tienda.php?accion=eliminar&id=<?php echo $prenda['id_tienda']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
