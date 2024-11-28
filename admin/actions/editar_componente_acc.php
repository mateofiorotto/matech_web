<?php 
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

//obtengo el post y la img
$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;

try {
    //obtengo el comp x id
    $componente = Componente::producto_por_id($id);

    //llamo al metodo limpiar etiquetas
    $componente->limpiar_etiquetas();

    //verifico si hay etiquetas
    if (isset($postData['etiquetas'])) {
        //si hay, agregamos las etiquetas
        foreach ($postData['etiquetas'] as $etiqueta_id) {
            $componente->agregar_etiquetas($id, $etiqueta_id);
        }
    }
    
    if (!empty($fileData['tmp_name'])) {
        //el usuario reemplazo la img
        $imagen = Imagen::subirImagen("../../elementos-graficos/productos", $fileData);
        Imagen::borrarImagen("../../elementos-graficos/productos/" . $componente->getImagen());
    
    } else {
        //dejar img original
        $imagen = $postData['imagen_og'];
    }
    
    //asigno los valores al metodo edit
    $componente->edit(
        $postData['marca_id'],
        $postData['categoria_id'],
        $postData['nombre'],
        $postData['precio'],
        $postData['descripcion'],
        $postData['fecha_lanzamiento'],
        $imagen,
        $postData['dimensiones'],
    );
    Alerta::anadir_alerta('warning', "El componente se editó correctamente");

} catch (Exception $e) {
    Alerta::anadir_alerta('danger', "El componente no se puede editar");
}

//mandarlo a admin_comps
header('Location: ../index.php?seccion=admin_componentes');
?>