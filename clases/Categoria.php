<?php
class Categoria
{
    private $id;
    private $nombre;
    private $nombre_url;

    /**
     * Devuelve el listado de categorías completo
     * 
     * @return Categoria[] Un array de objetos Categoria
     */
    public static function listado_de_categorias(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_categorias = $PDOStatement->fetchAll();

        return $lista_categorias;
    }

     /**
     * Devuelve los datos de una categoria por su identificador
     * @param int $idCategoria es el ID de la categoria a mostrar
     *  
     * @return ?Categoria devuelve un objeto Categoria o nulo   
     */

    public static function categoria_por_id(int $idCategoria): ?Categoria
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idCategoria]);

        $categoria = $PDOStatement->fetch();

        return $categoria ?: null;
    }


    /**
     * Inserta una nueva categoria en la base de datos
     * @param string $nombre Nombre de la categoria
     * @param string $nombre_url Nombre para URL
     */
    public static function insert(string $nombre, string $nombre_url)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO categorias (`nombre`, `nombre_url`) 
              VALUES (:nombre, :nombre_url)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'nombre_url' => $nombre_url
        ]);
    }

      /**
 * Edita una categoria en la base de datos
 * @param string $nombre Nombre de la categoria
 * @param string $nombre_url Nombre para URL
 */
public function edit(string $nombre, string $nombre_url)
{
    $conexion = Conexion::getConexion();
    $query = "UPDATE categorias
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
     * Elimina esta instancia de la base de datos de la tabla categorias
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categorias WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
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
