<?php 
require_once "../../funciones/autoload.php";

$items = Carrito::get_carrito();
$userID = $_SESSION['loggedIn']['id'] ?? FALSE;

try {
    if ($userID) {
        //valido que el carrito no este vacio (por si el usuario accede al checkout x url)
        if (empty($items)) {
            Alerta::anadir_alerta('danger', "Tu checkout esta vacio. Por favor, agrega productos.");
            header('location: ../../index.php?seccion=panel_usuario');
        } else {
            //paso los datos de la compra (id, fecha e importe)
            $datosCompra = [
                "id_usuario" => $userID,
                "fecha" => gmdate("Y-m-d H:i:s"),
                "importe" => Carrito::precio_total()
            ];
    
            $detalleCompra = [];
            
            foreach ($items as $key => $value) {
                $detalleCompra[$key] = $value['cantidad'];
            }
            //inserto los datos del checkout y vacio el carrito
            Checkout::insertar_data_checkout($datosCompra, $detalleCompra);
            Carrito::vaciar_carrito();
    
            Alerta::anadir_alerta('success', "Su compra se realizó correctamente, te enviaremos el comprobante por mail.");
            header('location: ../../index.php?seccion=panel_usuario');
        }

    } else {
        Alerta::anadir_alerta('warning', "Su sesión expiró. Ingresa nuevamente.");
        header('location: ../../index.php?seccion=login');
    }
} catch (Exception $e) {
    Alerta::anadir_alerta('danger', "No se pudo finalizar la compra.");
    header('location: ../../index.php?seccion=panel_usuario');
}

?>