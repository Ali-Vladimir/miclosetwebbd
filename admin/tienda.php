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
            $mensaje = "La tienda se agrego correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar la tienda";
            $tipo = "danger";
        }
        $tiendas = $app->readAll();
        include('views/tienda/index.php');
        break;

    case 'actualizar':
        $tiendas = $app->readOne($id);
        include('views/tienda/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "La tienda se modificó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al modificar la tienda";
            $tipo = "danger";
        }
        $tiendas = $app->readAll();
        include('views/tienda/index.php');
        break;

    case 'eliminar':
        if(!is_null($id)){
            if(is_numeric($id)){
                $resultado=$app->delete($id);
                if($resultado){
                    $mensaje="Se elimino exitosamente la tienda";
                    $tipo="success";
                }else{
                    $mensaje="Hubo un problema con la eliminacion";
                    $tipo="danger";
                }
            }
        }
        $tiendas = $app->readAll();
        include 'views/tienda/index.php';
        break;

    default:
        $tiendas = $app->readAll();
        include 'views/tienda/index.php';
}
?>
