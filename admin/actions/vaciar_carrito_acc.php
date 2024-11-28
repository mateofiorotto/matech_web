<?php 
require_once "../../funciones/autoload.php";

//llamo a vaciar_carrito 
Carrito::vaciar_carrito();
header('location: ../../index.php?seccion=carrito');


?>