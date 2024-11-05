<?php require('views/header.php') ?>
<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo('Modificar'); endif; ?> Usuario</h1>
<form method="post" action="usuario.php?accion=<?php if($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $usuario['id_usuario']); endif; ?>">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Usuario</label>
        <input class="form-control" type="text" name="data[nombre]" placeholder="Escribe el nombre del usuario" id="nombre"
        value="<?php if(isset($usuario['nombre'])): echo($usuario['nombre']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" name="data[email]" placeholder="Escribe el email" id="email"
        value="<?php if(isset($usuario['email'])): echo($usuario['email']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="contraseña" class="form-label">Contraseña</label>
        <input class="form-control" type="password" name="data[contraseña]" placeholder="Escribe la contraseña" id="contraseña"
        value="<?php if(isset($usuario['contraseña'])): echo($usuario['contraseña']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input class="form-control" type="text" name="data[direccion]" placeholder="Escribe la dirección" id="direccion"
        value="<?php if(isset($usuario['direccion'])): echo($usuario['direccion']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input class="form-control" type="text" name="data[telefono]" placeholder="Escribe el teléfono" id="telefono"
        value="<?php if(isset($usuario['telefono'])): echo($usuario['telefono']); endif; ?>"/>
    </div>

    <div class="mb-3">
        <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
    </div>
</form>
<?php require('views/footer.php') ?>
