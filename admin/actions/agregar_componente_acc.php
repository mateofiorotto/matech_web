<?PHP 
require_once "../../funciones/autoload.php";

//obtengo el post y la img
$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;

try {
    //asigno la img a la clase Img con el metodo de subir y le paso el directorio y la img
    $imagen = Imagen::subirImagen("../../elementos-graficos/productos", $fileData);

    //inserto a $componenteId todos los valores
    $componenteId = Componente::insert(
        $postData['marca_id'],
        $postData['categoria_id'],
        $postData['nombre'],
        $postData['precio'],
        $postData['descripcion'],
        $postData['fecha_lanzamiento'],
        $imagen,
        $postData['dimensiones'],
    );

    // si en $postData hay etiquetas entonces itero sobre c/u de los valores de 'etiquetas'
    // y cada valor se asigna a $etiqueda_id
    // luego llamo a agregar_etiquetas y le paso el parametro de la id del componente y la id de la etiqueta
    if (isset($postData['etiquetas'])) {
        foreach ($postData['etiquetas'] as $etiqueta_id) {
            Componente::agregar_etiquetas($componenteId, $etiqueta_id);
        }
    }
    Alerta::anadir_alerta('success', "El componente fue creado correctamente");
} catch (Exception $e) {
   
    Alerta::anadir_alerta('danger', "El componente no se pudo crear");

}

//lo redirecciono a admin componentes
header('Location: ../index.php?seccion=admin_componentes');
?>