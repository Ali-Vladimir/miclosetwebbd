<?php
require_once ('ropa_tienda.class.php');
$app = new RopaTienda; // Clase correspondiente para trabajar con "ropa_tienda"
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch($accion) {
    case 'crear':
        include 'views/ropa_tienda/crear.php';
        break;

    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "La prenda se agregó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar la prenda";
            $tipo = "danger";
        }
        $ropas = $app->readAll();
        include('views/ropa_tienda/index.php');
        break;

    case 'actualizar':
        $ropas = $app->readOne($id);
        include('views/ropa_tienda/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "La prenda se modificó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al modificar la prenda";
            $tipo = "danger";
        }
        $ropas = $app->readAll();
        include('views/ropa_tienda/index.php');
        break;

    case 'eliminar':
        if(!is_null($id)){
            if(is_numeric($id)){
                $resultado=$app->delete($id);
                if($resultado){
                    $mensaje="Se eliminó exitosamente la prenda";
                    $tipo="success";
                }else{
                    $mensaje="Hubo un problema con la eliminación";
                    $tipo="danger";
                }
            }
        }
        $ropas = $app->readAll();
        include 'views/ropa_tienda/index.php';
        break;

    default:
        $ropas = $app->readAll();
        include 'views/ropa_tienda/index.php';
}
?>
