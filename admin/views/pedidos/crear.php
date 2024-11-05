<?php require('views/header.php'); ?>
<h1><?php echo ($accion == "crear") ? "Nuevo" : "Modificar"; ?> Pedido</h1>
<form method="post" action="pedidos.php?accion=<?php echo ($accion == "crear") ? "nuevo" : "modificar&id=" . $pedidoActual['id_pedido']; ?>">
    
    <div class="mb-3">
        <label for="id_usuario" class="form-label">ID Usuario</label>
        <input type="text" class="form-control" name="data[id_usuario]" id="id_usuario" placeholder="Escribe el ID del usuario" 
               value="<?php echo isset($pedidoActual['id_usuario']) ? $pedidoActual['id_usuario'] : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="fecha_pedido" class="form-label">Fecha del Pedido</label>
        <input type="date" class="form-control" name="data[fecha_pedido]" id="fecha_pedido" 
               value="<?php echo isset($pedidoActual['fecha_pedido']) ? $pedidoActual['fecha_pedido'] : ''; ?>">
    </div>

    <div class="mb-3">
        <label for="estado_pedido" class="form-label">Estado del Pedido</label>
        <input type="text" class="form-control" name="data[estado_pedido]" id="estado_pedido" placeholder="Escribe el estado del pedido" 
               value="<?php echo isset($pedidoActual['estado_pedido']) ? $pedidoActual['estado_pedido'] : ''; ?>">
    </div>

    <div class="mb-3">
        <label for="direccion_envio" class="form-label">Dirección de Envío</label>
        <input type="text" class="form-control" name="data[direccion_envio]" id="direccion_envio" placeholder="Escribe la dirección de envío" 
               value="<?php echo isset($pedidoActual['direccion_envio']) ? $pedidoActual['direccion_envio'] : ''; ?>">
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-success" name="data[enviar]" value="Guardar">
    </div>
</form>
<?php require('views/footer.php'); ?>
