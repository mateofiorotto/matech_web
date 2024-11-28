<?php 
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;
try {
    $categoria = Categoria::categoria_por_id($id);
    
    $categoria->edit(
        $postData['nombre'],
        $postData['nombre_url']
    );
    Alerta::anadir_alerta('warning', "La categoria se editó correctamente");

} catch (Exception $e) {
    Alerta::anadir_alerta('danger', "La categoria no se puede editar");
}

header('Location: ../index.php?seccion=admin_categorias');
?>