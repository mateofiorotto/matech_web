<?php 
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

if($id){
    //si tengo id elimino el item del carrito
    Carrito::eliminar_item($id);
    header('location: ../../index.php?seccion=carrito');
}

?>