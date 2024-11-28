<?php

class Etiqueta
{
    private $id;
    private $nombre;
    private $nombre_url;

    /**
     * Devuelve el listado de etiquetas completo
     * 
     * @return Etiqueta[] Un array de objetos Etiqueta
     */
    public static function listado_de_etiquetas(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM etiquetas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_etiquetas = $PDOStatement->fetchAll();

        return $lista_etiquetas;
    }

    /**
     * Devuelve los datos de una etiqueta por su identificador
     * @param int $idEtiqueta es el ID de la etiqueta a mostrar
     *  
     * @return ?Etiqueta devuelve un objeto Etiqueta o nulo   
     */

    public static function etiqueta_por_id(int $idEtiqueta): ?Etiqueta
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM etiquetas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idEtiqueta]);

        $etiqueta = $PDOStatement->fetch();

        return $etiqueta ?: null;
    }

    /**
     * Inserta una nueva etiqueta en la base de datos
     * @param string $nombre Nombre de la categoria
     * @param string $nombre_url Nombre para URL
     */
    public static function insert(string $nombre, string $nombre_url)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO etiquetas (`nombre`, `nombre_url`) 
              VALUES (:nombre, :nombre_url)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'nombre_url' => $nombre_url
        ]);
    }

    /**
     * Edita una etiqueta en la base de datos
     * @param string $nombre Nombre de la etiqueta
     * @param string $nombre_url Nombre para URL
     */
    public function edit(string $nombre, string $nombre_url)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE etiquetas 
              SET nombre = :nombre, 
                  nombre_url = :nombre_url
              WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'nombre_url' => $nombre_url,
            'id' => $this->id,
        ]);
    }

    /**
     * Elimina esta instancia de la base de datos de la tabla etiquetas
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM etiquetas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Obtener la ID de la etiqueta
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Obtener el nombre de la etiqueta
     * 
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Establecer la ID de la etiqueta
     * 
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Establecer el nombre de la etiqueta
     * 
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of nombre_url
     */
    public function getNombre_url()
    {
        return $this->nombre_url;
    }

    /**
     * Set the value of nombre_url
     *
     * @return  self
     */
    public function setNombre_url($nombre_url)
    {
        $this->nombre_url = $nombre_url;

        return $this;
    }
}
