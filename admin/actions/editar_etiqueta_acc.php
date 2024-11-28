<?php 
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;
try {
    $etiqueta = Etiqueta::etiqueta_por_id($id);
    
    $etiqueta->edit(
        $postData['nombre'],
        $postData['nombre_url']
    );
    Alerta::anadir_alerta('warning', "La etiqueta se editó correctamente");

} catch (Exception $e) {
    Alerta::anadir_alerta('danger', "La etiqueta no se puede editar");
}

header('Location: ../index.php?seccion=admin_etiquetas');
?>