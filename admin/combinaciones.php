<?php
require_once('combinaciones.class.php');

// Crear una instancia de la clase Combinaciones
$app = new Combinaciones();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;
$id_combinacion = (isset($_GET['id'])) ? $_GET['id'] : null;

switch($accion) {
    case 'crear':
        include 'views/combinaciones/crear.php';
        break;

    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->crearCombinacion($data);
        if ($resultado) {
            $mensaje = "La combinación se agregó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar la combinación";
            $tipo = "danger";
        }
        $combinaciones = $app->obtenerCombinaciones();
        include('views/combinaciones/index.php');
        break;

    case 'actualizar':
        $combinacionActual = $app->obtenerCombinacion($id_combinacion);
        include 'views/combinaciones/crear.php';
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->actualizarCombinacion($id_combinacion, $data);
        if ($resultado) {
            $mensaje = "La combinación se modificó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al modificar la combinación";
            $tipo = "danger";
        }
        $combinaciones = $app->obtenerCombinaciones();
        include('views/combinaciones/index.php');
        break;

    case 'eliminar':
        if (!is_null($id_combinacion) && is_numeric($id_combinacion)) {
            $resultado = $app->eliminarCombinacion($id_combinacion);
            if ($resultado) {
                $mensaje = "Se eliminó exitosamente la combinación";
                $tipo = "success";
            } else {
                $mensaje = "Hubo un problema con la eliminación";
                $tipo = "danger";
            }
        }
        $combinaciones = $app->obtenerCombinaciones();
        include 'views/combinaciones/index.php';
        break;

    default:
        $combinaciones = $app->obtenerCombinaciones();
        include 'views/combinaciones/index.php';
}
?>
