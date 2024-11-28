<?php
//creo la clase con todos sus atributos privados
class Componente
{
    private int $id;
    private string $nombre;
    private float $precio;
    private string $descripcion;
    private string $fecha_lanzamiento;
    private Marca $marca;
    private Categoria $categoria;
    private string $imagen;
    private string $dimensiones;
    private array $etiquetas;

    private static $crearValores = ['id', 'nombre', 'precio', 'descripcion', 'fecha_lanzamiento', 'imagen', 'dimensiones'];

    /**
     * Devuelve una instancia del objeto Componente, con todas sus propiedades configuradas
     *@return Componente
     */
    private static function crearComponente($datosComponente): Componente
    {
        //Nueva instancia del objeto
        $componente = new self();

        //Configuramos el objeto
        foreach (self::$crearValores as $valor) {
            $componente->{$valor} = $datosComponente[$valor];
        }

        //objeto Marca con los datos correspondientes, asignandolo a la propiedad
        $componente->marca = Marca::marca_por_id($datosComponente['marca_id']);

        //objeto categoria con los datos correspondientes, asignandolo a la propiedad
        $componente->categoria = Categoria::categoria_por_id($datosComponente['categoria_id']);

        //lista de etiquetas ids
        $ESIds =
            !empty($datosComponente['etiquetas']) ?
            explode(",", $datosComponente['etiquetas']) : [];

        $etiquetas = [];

        foreach ($ESIds as $EId) {
            $etiquetas[] = Etiqueta::etiqueta_por_id($EId);
        }

        $componente->etiquetas = $etiquetas;

        return $componente;
    }

    /**
     * Devuelve el listado de productos completo
     * 
     * @return Componente[] Un array de objetos Componente
     */
    public static function listado_de_productos(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT 
                  componentes.*, 
                  GROUP_CONCAT(cxet.etiqueta_id) AS etiquetas 
              FROM componentes 
              LEFT JOIN componentes_x_etiquetas AS cxet ON componentes.id = cxet.componente_id
              GROUP BY componentes.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($resultado = $PDOStatement->fetch()) {
            $catalogo[] = self::crearComponente($resultado);
        }

        return $catalogo;
    }

    /**
     * Devuelve los datos de un producto por su identificador
     * @param int $idProducto es el ID del producto a mostrar
     *  
     * @return ?Componente devuelve un objeto componente o nulo   
     */
    public static function producto_por_id(int $idProducto): ?Componente
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT 
                  componentes.*, 
                  GROUP_CONCAT(cxet.etiqueta_id) AS etiquetas 
              FROM componentes 
              LEFT JOIN componentes_x_etiquetas AS cxet ON componentes.id = cxet.componente_id
              WHERE componentes.id = ?
              GROUP BY componentes.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idProducto]);

        $resultado = $PDOStatement->fetch();

        if ($resultado === false) {
            //si no hay resultado, retornar null
            return null;
        }

        //si hay resultados retornar null
        return self::crearComponente($resultado);

        //esto lo hago, porque si le proporciono una ID no valida x URL, el detalle del prod tira un error de php
    }

    /**
     * Devuelve el listado de productos segun su categoria
     * @param string $categoria Un string con el nombre de la categoria a buscar
     * 
     * @return Componente[] Un Array lleno de instancias del objeto Componente.
     */
    public static function listado_por_categoria(string $categoria): array
    {
        $conexion = Conexion::getConexion();

         //cargo los productos de x categoria que coincidan con lo que se pasa por url en el get
        $query = "
        SELECT c.*
        FROM componentes c
        JOIN categorias m ON c.categoria_id = m.id
        WHERE m.nombre_url = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$categoria]);

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    /**
     * Devuelve el listado de productos segun su marca
     * @param string $marca Un string con el nombre de la marca a buscar
     * 
     * @return Componente[] Un Array lleno de instancias del objeto Componente.
     */
    public static function listado_por_marca(string $marca): array
    {
        $conexion = Conexion::getConexion();

        //cargo los productos de x marca que coincidan con lo que se pasa por url en el get
        $query = "
        SELECT c.* 
        FROM componentes c
        JOIN marcas m ON c.marca_id = m.id
        WHERE m.nombre_url = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$marca]);

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    /**
     * Ordena el listado de productos por precio
     * 
     * @return Componente[] Un array de objetos Componente ordenado por precio de menor a mayor
     */
    public static function listado_por_precio(): array
    {
        $listado = self::listado_de_productos();

        usort($listado, function ($a, $b) {
            return $a->getPrecio() <=> $b->getPrecio();
        });

        return $listado;
    }

    /**
     * Devuelve los componentes de una marca por su ID utilizando JOIN
     * @param int $idMarca es el ID de la marca
     * @return array Un array de objetos de componentes
     */
    public static function componentes_por_marca(int $idMarca): array
    {
        $conexion = Conexion::getConexion();
        $query = "
            SELECT componentes.*, marcas.nombre AS nombre_marca, marcas.descripcion AS descripcion_marca 
            FROM componentes 
            JOIN marcas ON componentes.marca_id = marcas.id 
            WHERE componentes.marca_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$idMarca]);

        return $PDOStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Devolvemos el precio del componente formateado correctamente
     * con el signo pesos (dolar), la coma y el punto
     */
    public function precio_formateado(): string
    {
        return "$" . number_format($this->precio, 2, ",", ".");
    }


    /**
     * Devolvemos la descripción del producto reducida a 11 palabras como maximo
     */

    public function descripcion_reducida(int $cantidad = 11): string
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
     * Busca productos por nombre / descripcion
     * @param string $busqueda es lo que ingresa el usuario en el buscador
     * @return Componente[] Un array de objetos Componente que coinciden con el termino de busqueda
     */
    /**
     * Busca productos por nombre / descripción
     * @param string $busqueda El término de búsqueda ingresado por el usuario
     * @return Componente[] Un array de objetos Componente que coinciden con el término de búsqueda
     */
    public static function buscar_productos(string $busqueda): array
    {
        // Obtiene la conexión a la base de datos
        $conexion = Conexion::getConexion();

        // Prepara el término de búsqueda con comodines para SQL
        $busqueda = '%' . $busqueda . '%';

        // Consulta SQL que busca coincidencias en el nombre o descripción
        $query = "
        SELECT * 
        FROM componentes 
        WHERE nombre LIKE ? OR descripcion LIKE ?";

        // Prepara la consulta
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        // Ejecuta la consulta pasando los valores en el orden de los placeholders
        $PDOStatement->execute([$busqueda, $busqueda]);

        // Recupera los resultados
        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    /**
     * Busca componentes cuyo precio este dentro de un rango especifico.
     *
     * @param float $precioMin Precio minimo del rango.
     * @param float $precioMax Precio maximo del rango.
     * @return array Lista de componentes filtrada
     */
    public static function buscar_precios(float $precioMin, float $precioMax): array
    {
        $conexion = Conexion::getConexion();

        //obtengo componentes donde el precio este entre precioMin y precioMax
        $query = "SELECT * FROM componentes WHERE precio BETWEEN ? AND ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$precioMin, $precioMax]);

        return $PDOStatement->fetchAll();
    }

    /**
     * Ordena la lista segun su precio
     *
     * @return array Lista de componentes ordenadas por precio
     */
    public static function ordenar_por_precio(string $orden = 'ASC'): array
    {
        $conexion = Conexion::getConexion();

        //obtengo componentes donde el precio este entre precioMin y precioMax
        $query = "SELECT * FROM componentes ORDER BY precio " . $orden;

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([]);

        return $PDOStatement->fetchAll();
    }

    /**
     * Inserta un nuevo componente a la base de datos
     * @param string $nombre
     * @param float $precio
     * @param string $descripcion
     * @param string $fecha_lanzamiento Fecha de lanzamiento en formato 'YYYY-MM-DD'
     * @param int $marca_id ID de la marca
     * @param int $categoria_id ID de la categoría
     * @param string $dimensiones Dimensiones del componente
     * @param string $imagen Ruta a un archivo de imagen (.jpg, .png, o .webp)
     */
    public static function insert(int $marca_id, int $categoria_id, string $nombre, float $precio, string $descripcion, string $fecha_lanzamiento, string $imagen, string $dimensiones): int
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO componentes (id, marca_id, categoria_id, nombre, precio, descripcion, fecha_lanzamiento, imagen, dimensiones) 
    VALUES (NULL, :marca_id, :categoria_id, :nombre, :precio, :descripcion, :fecha_lanzamiento, :imagen, :dimensiones)";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'marca_id' => $marca_id,
            'categoria_id' => $categoria_id,
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'fecha_lanzamiento' => $fecha_lanzamiento,
            'imagen' => $imagen,
            'dimensiones' => $dimensiones
        ]);

        return $conexion->lastInsertId();
    }

    /**
     * Crea un vinculo entre un componente y una etiqueta
     * @param int $componente_id
     * @param int $etiqueta_id
     */
    public static function agregar_etiquetas(int $componente_id, int $etiqueta_id)
    {
        $conexion = Conexion::getConexion();
        //inserto en la tabla pivot la id del prod y de la tabla pivot
        $query = "INSERT INTO componentes_x_etiquetas VALUES (NULL, :componente_id, :etiqueta_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'componente_id' => $componente_id,
                'etiqueta_id' => $etiqueta_id
            ]
        );
    }

    /**
     * Edita un componente en la base de datos
     * @param string $nombre
     * @param float $precio
     * @param string $descripcion
     * @param string $fecha_lanzamiento Fecha de lanzamiento en formato 'YYYY-MM-DD'
     * @param int $marca_id ID de la marca
     * @param int $categoria_id ID de la categoría
     * @param string $dimensiones Dimensiones del componente
     * @param string $imagen Ruta a un archivo de imagen (.jpg, .png, o .webp)
     */

    public function edit(int $marca_id, int $categoria_id, string $nombre, float $precio, string $descripcion, string $fecha_lanzamiento, string $imagen, string $dimensiones)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE componentes SET
               marca_id = :marca_id,
               categoria_id = :categoria_id,
               nombre = :nombre,
               precio = :precio,
               descripcion = :descripcion,
               fecha_lanzamiento = :fecha_lanzamiento,
               imagen = :imagen,
               dimensiones = :dimensiones
              WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'marca_id' => $marca_id,
            'categoria_id' => $categoria_id,
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'fecha_lanzamiento' => $fecha_lanzamiento,
            'imagen' => $imagen,
            'dimensiones' => $dimensiones,
            'id' => $this->id,
        ]);
    }

    /**
     * Vaciar lista de etiquetas
     */
    public function limpiar_etiquetas()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM componentes_x_etiquetas WHERE componente_id = :componente_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'componente_id' => $this->id
            ]
        );
    }

    /**
     * Elimina esta instancia de la base de datos de la tabla componentes
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM componentes WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    // GETTERS
    /**
     * Obtener la ID del componente
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Obtener el nombre del componente
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Obtener el precio del componente
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Obtener la descripcion del componente
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Obtener la fecha de lanzamiento del componente
     */
    public function getFechaLanzamiento()
    {
        return $this->fecha_lanzamiento;
    }

    /**
     * Obtener la marca del componente
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Obtener la categoria del componente
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Obtener la imagen del componente
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Obtener la dimension del componente
     */
    public function getDimension()
    {
        return $this->dimensiones;
    }

    // SETTERS

    /**
     * Settear la id del componente
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Settear el nombre del componente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Settear el precio del componente
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * Settear la descripcion del componente
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Settear la fecha de lanzamiento del componente
     */
    public function setFechaLanzamiento($fecha_lanzamiento)
    {
        $this->fecha_lanzamiento = $fecha_lanzamiento;
    }

    /**
     * Settear la imagen del componente
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * Settear la dimension del componente
     */
    public function setDimension($dimensiones)
    {
        $this->dimensiones = $dimensiones;
    }


    /**
     * Get the value of etiquetas
     */
    public function getEtiquetas()
    {
        return $this->etiquetas;
    }

    /**
     * Devuelve un array compuesto por IDs de todas las etiquetas
     */
    public function getEtiquetas_ids(): array
    {
        $resultado = [];
        foreach ($this->etiquetas as $valor) {
            $resultado[] = intval($valor->getId());
        }
        return $resultado;
    }
}
