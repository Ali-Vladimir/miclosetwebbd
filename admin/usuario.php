<?php
require_once ('usuario.class.php');
$app = new Usuario; // Cambiado a la clase correspondiente para trabajar con "usuario"
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch($accion) {
    case 'crear':
        include 'views/usuario/crear.php';
        break;

    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El usuario se agregó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar el usuario";
            $tipo = "danger";
        }
        $usuarios = $app->readAll();
        include('views/usuario/index.php');
        break;

    case 'actualizar':
        $usuario = $app->readOne($id);
        include('views/usuario/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El usuario se modificó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al modificar el usuario";
            $tipo = "danger";
        }
        $usuarios = $app->readAll();
        include('views/usuario/index.php');
        break;

    case 'eliminar':
        if(!is_null($id)){
            if(is_numeric($id)){
                $resultado=$app->delete($id);
                if($resultado){
                    $mensaje="Se eliminó exitosamente el usuario";
                    $tipo="success";
                }else{
                    $mensaje="Hubo un problema con la eliminación";
                    $tipo="danger";
                }
            }
        }
        $usuarios = $app->readAll();
        include 'views/usuario/index.php';
        break;

    default:
        $usuarios = $app->readAll();
        include 'views/usuario/index.php';
}
?>
