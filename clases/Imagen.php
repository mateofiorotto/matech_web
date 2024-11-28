<?php

class Imagen
{
    /**
     * Sube una imagen con una id unica basado en time
     * Separa la extension y lo concatena al nombre unico y lo sube a la carpeta
    */
    public static function subirImagen($directorio, $fileData): string
    {
        $nombreImagenOriginal = (explode(".", $fileData['name']));
        $extension = end($nombreImagenOriginal);
        $nombreImagenNuevo = time() . ".$extension";

        $archivoSubido = move_uploaded_file($fileData['tmp_name'], "$directorio/$nombreImagenNuevo");

        if (!$archivoSubido) {
            throw new Exception("No se pudo subir la imagen");
        } else {
            return $nombreImagenNuevo;
        }
    }

    /**
     * Borra una imagen luego de que el usuario la cambie
    */
    public static function borrarImagen($archivo): bool 
    {
        if (file_exists($archivo)) {

            $borrarArchivo = unlink($archivo);

            if (!$borrarArchivo) {
                throw new Exception("No se pudo eliminar la imagen");
            } else {
                return TRUE;
            }

        } else {
            return FALSE;
        }
        
    }

    
}
