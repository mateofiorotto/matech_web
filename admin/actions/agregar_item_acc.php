<?php 
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;
$cantidad = $_GET['q'] ?? 1;

if($id){
    //si tengo id agrego el item y la cantidad al carrito
    Carrito::agregar_item($id, $cantidad);
    header('location: ../../index.php?seccion=carrito');
}

?>