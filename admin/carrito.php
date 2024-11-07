<?php
require_once ('carrito.class.php');
$app = new Carrito; // Clase correspondiente para trabajar con "carrito"
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch($accion) {
    case 'crear':
        include 'views/carrito/crear.php';
        break;

    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El carrito se agregó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar el carrito";
            $tipo = "danger";
        }
        $carritos = $app->readAll();
        include('views/carrito/index.php');
        break;

    case 'actualizar':
        $carritos = $app->readOne($id);
        include('views/carrito/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El carrito se modificó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al modificar el carrito";
            $tipo = "danger";
        }
        $carritos = $app->readAll();
        include('views/carrito/index.php');
        break;

    case 'eliminar':
        if(!is_null($id)){
            if(is_numeric($id)){
                $resultado = $app->delete($id);
                if($resultado){
                    $mensaje = "Se eliminó exitosamente el carrito";
                    $tipo = "success";
                } else {
                    $mensaje = "Hubo un problema con la eliminación";
                    $tipo = "danger";
                }
            }
        }
        $carritos = $app->readAll();
        include 'views/carrito/index.php';
        break;

    default:
        $carritos = $app->readAll();
        include 'views/carrito/index.php';
}
?>
