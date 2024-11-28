<?php 
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

//post e img 
$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;

try {
    //obtener marca
    $marca = Marca::marca_por_id($id);
    
    if (!empty($fileData['tmp_name'])) {
        //el usuario reemplazo la img
        $imagen = Imagen::subirImagen("../../elementos-graficos/marcas", $fileData);
        Imagen::borrarImagen("../../elementos-graficos/marcas/" . $marca->getImagen());
        

    } else {
        $imagen = $postData['imagen_og'];
    }
    
    //llamo al metodo edit
    $marca->edit(
        $postData['nombre'],
        $postData['nombre_url'],
        $postData['descripcion'],
        $postData['fundacion'],
        $postData['origen'],
        $imagen,
    );
    Alerta::anadir_alerta('warning', "La marca se editó correctamente");

} catch (Exception $e) {
    Alerta::anadir_alerta('danger', "La marca no se puede editar");
}

//redirecc.
header('Location: ../index.php?seccion=admin_marcas');
?>