<?php
require_once 'pedidos.class.php';

// Crear una instancia de la clase Pedido
$app = new Pedido();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($accion) {
    case 'crear':
        include 'views/pedidos/crear.php';
        break;

    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El pedido se creó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al crear el pedido";
            $tipo = "danger";
        }
        $pedidos = $app->readAll();
        include('views/pedidos/index.php');
        break;

    case 'actualizar':
        $pedidoActual = $app->readOne($id);
        include('views/pedidos/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El pedido se modificó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al modificar el pedido";
            $tipo = "danger";
        }
        $pedidos = $app->readAll();
        include('views/pedidos/index.php');
        break;

    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "Se eliminó exitosamente el pedido";
                    $tipo = "success";
                } else {
                    $mensaje = "Hubo un problema con la eliminación del pedido";
                    $tipo = "danger";
                }
            }
        }
        $pedidos = $app->readAll();
        include 'views/pedidos/index.php';
        break;

    default:
        $pedidos = $app->readAll();
        include 'views/pedidos/index.php';
}
?>
