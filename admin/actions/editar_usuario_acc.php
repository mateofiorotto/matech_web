<?php 
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;
try {
    $usuario = Usuario::usuario_por_id($id);
    
    $usuario->edit(
        $postData['email'],
        $postData['nombre_usuario'],
        $postData['nombre_completo'],
        (int)$postData['telefono'],
        $postData['direccion'],
        $postData['rol']
    );
    Alerta::anadir_alerta('warning', "El usuario se editó correctamente");

} catch (Exception $e) {
    Alerta::anadir_alerta('danger', "El usuario no se puede editar");
}

header('Location: ../index.php?seccion=admin_usuarios');
?>