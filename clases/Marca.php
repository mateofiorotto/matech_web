<?php

class Marca
{
    private $id;
    private $nombre;
    private $nombre_url;
    private $descripcion;
    private $fundacion;
    private $origen;
    private $imagen;


    /**
     * Devuelve el listado de marcas completo
     * 
     * @return Marca[] Un array de objetos Marca
     */

    //listado de marcas para una pagina aparte
    public static function listado_de_marcas(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_marcas = $PDOStatement->fetchAll();

        return $lista_marcas;
    }

    /**
     * Devuelve los datos de una marca por su identificador
     * @param int $idMarca es el ID de la marca a mostrar
     *  
     * @return ?Marca devuelve un objeto Marca o nulo   
     */

    //marca x id, es igual a componente solo que con la tabla marcas
    public static function marca_por_id(int $idMarca): ?Marca
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idMarca]);

        $marca = $PDOStatement->fetch();

        return $marca ?: null;
    }

    /**
     * Devolvemos la descripción del producto reducida a 10 palabras como maximo
     */

    public function descripcion_reducida(int $cantidad = 10): string
    {
        $descripcion_reducida = $this->descripcion;

        $array = explode(" ", $descripcion_reducida);
        if (count($array) <= $cantidad) {
            $resultado = $descripcion_reducida;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array) . "...";
        }

        return $resultado;
    }

    /**
     * Inserta una nueva marca en la base de datos
     * @param string $nombre Nombre de la marca
     * @param string $nombre_url Nombre para URL
     * @param string $descripcion Descripción de la marca
     * @param int $fundacion Año de fundación de la marca
     * @param string $origen País de origen de la marca
     * @param string $imagen imagen de la marca
     */
    public static function insert(string $nombre, string $nombre_url, string $descripcion, int $fundacion, string $origen, string $imagen)
    {
       
        $conexion = Conexion::getConexion();

        $query = "INSERT INTO marcas (nombre, nombre_url, descripcion, fundacion, origen, `imagen`) 
              VALUES (:nombre, :nombre_url, :descripcion, :fundacion, :origen, :imagen)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'nombre_url' => $nombre_url,
            'descripcion' => $descripcion,
            'fundacion' => $fundacion,
            'origen' => $origen,
            'imagen' => $imagen
        ]);
    }


    /**
     * Edita una marca en la base de datos
     * @param string $nombre Nombre de la marca
     * @param string $nombre_url Nombre para URL
     * @param string $descripcion Descripción de la marca
     * @param int $fundacion Año de fundación de la marca
     * @param string $origen País de origen de la marca
     * @param string $imagen imagen de la marca
     */
    public function edit(string $nombre, string $nombre_url, string $descripcion, string $fundacion, string $origen, string $imagen)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE marcas 
              SET nombre = :nombre, 
                  nombre_url = :nombre_url, 
                  descripcion = :descripcion, 
                  fundacion = :fundacion, 
                  origen = :origen, 
                  imagen = :imagen 
              WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'nombre_url' => $nombre_url,
            'descripcion' => $descripcion,
            'fundacion' => $fundacion,
            'origen' => $origen,
            'imagen' => $imagen,
            'id' => $this->id,
        ]);
    }

    /**
     * Elimina esta instancia de la base de datos de la tabla marcas
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM marcas WHERE id = ?";

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
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of fundacion
     */
    public function getFundacion()
    {
        return $this->fundacion;
    }

    /**
     * Set the value of fundacion
     *
     * @return  self
     */
    public function setFundacion($fundacion)
    {
        $this->fundacion = $fundacion;

        return $this;
    }

    /**
     * Get the value of origen
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set the value of origen
     *
     * @return  self
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

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
