<?php require('views/header.php'); ?>
<h1>Prendas de Usuarios</h1>
<?php if(isset($mensaje)):$app->alerta($tipo,$mensaje);endif; ?>
<a href="ropa_usuario.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">

    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuario</th>
        <th scope="col">Nombre de la Prenda</th>
        <th scope="col">Categoría</th>
        <th scope="col">Color</th>
        <th scope="col">Talla</th>
        <th scope="col">Estado</th>
        <th scope="col">Opciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($prendas as $prenda): ?>
    <tr>
        <th scope="row"><?php echo $prenda['id_ropa_usuario']; ?></th>
        <td><?php echo $prenda['id_usuario']; ?></td>
        <td><?php echo $prenda['nombre_prenda']; ?></td>
        <td><?php echo $prenda['categoria']; ?></td>
        <td><?php echo $prenda['color']; ?></td>
        <td><?php echo $prenda['talla']; ?></td>
        <td><?php echo $prenda['estado']; ?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="ropa_usuario.php?accion=actualizar&id=<?php echo $prenda['id_ropa_usuario']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="ropa_usuario.php?accion=eliminar&id=<?php echo $prenda['id_ropa_usuario']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
