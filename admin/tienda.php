<?php
require_once ('tienda.class.php');
$app = new Tienda; // Cambiado a la clase correspondiente para trabajar con "tienda"
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch($accion) {
    case 'crear':
        include 'views/tienda/crear.php';
        break;

    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El artículo se agregó correctamente a la tienda";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar el artículo";
            $tipo = "danger";
        }
        $ropaTienda = $app->readAll();
        include('views/tienda/index.php');
        break;

    case 'actualizar':
        $ropaTienda = $app->readOne($id);
        include('views/tienda/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El artículo se modificó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al modificar el artículo";
            $tipo = "danger";
        }
        $ropaTienda = $app->readAll();
        include('views/tienda/index.php');
        break;

    case 'eliminar':
        if (!is_null($id) && is_numeric($id)) {
            $resultado = $app->delete($id);
            if ($resultado) {
                $mensaje = "Se eliminó exitosamente el artículo";
                $tipo = "success";
            } else {
                $mensaje = "Hubo un problema con la eliminación";
                $tipo = "danger";
            }
        }
        $ropaTienda = $app->readAll();
        include 'views/tienda/index.php';
        break;

    default:
        $ropaTienda = $app->readAll();
        include 'views/tienda/index.php';
}
?>
