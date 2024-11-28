<?php 
require_once "../../funciones/autoload.php";

$postData = $_POST;

if (!empty($postData)) {
    //llamo a actualizar_cantidades y le paso la cantidad
    Carrito::actualizar_cantidades($postData['q']);
}

header('location: ../../index.php?seccion=carrito');

?>