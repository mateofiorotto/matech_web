<?PHP

class Usuario
{
    private $id;
    private $email;
    private $nombre_usuario;
    private $nombre_completo;
    private $contrasena;
    private $telefono;
    private $direccion;
    private $rol;

    /**
     * Devuelve el listado de usuarios completo
     * 
     * @return Usuario[] Un array de objetos Usuario
     */
    public static function listado_de_usuarios(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_usuarios = $PDOStatement->fetchAll();

        return $lista_usuarios;
    }

    /**
     * Devuelve los datos de una marca por su identificador
     * @param int $idUsuario es el ID del usuario a mostrar
     *  
     * @return ?Usuario devuelve un objeto Marca o nulo   
     */

    public static function usuario_por_id(int $idUsuario): ?Usuario
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idUsuario]);

        $usuario = $PDOStatement->fetch();

        return $usuario ?: null;
    }

    /**
    * Encuentra un usuario por su Username
    * @param string $usuario El nombre de usuario a buscar
    */
    public static function usuario_x_username(string $usuario): ?Usuario
    {
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute([$usuario]);

    $result = $PDOStatement->fetch();

    if (!$result) {
        return null;
    }

        return $result;
    }

    /**
     * Inserta una nuevo usuario en la BD
     * @param string $email Correo electronico
     * @param string $nombre_usuario Usuario para login
     * @param string $nombre_completo Nombre del usuario
     * @param string $contrasena Contraseña del usuario
     * @param string $rol Rol del usuario
     */
    public static function insert(string $email, string $nombre_usuario, string $nombre_completo, string $contrasena, int $telefono, string $direccion, string $rol)
    {
        $conexion = Conexion::getConexion();

        $hashearContrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (`email`, `nombre_usuario`, `nombre_completo`, `contrasena` , `telefono`, `direccion`, `rol`) 
              VALUES (:email, :nombre_usuario, :nombre_completo, :contrasena, :telefono, :direccion, :rol)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'email' => $email,
            'nombre_usuario' => $nombre_usuario,
            'nombre_completo' => $nombre_completo,
            'contrasena' => $hashearContrasena,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'rol' => $rol
        ]);
    }

    /**
     * Edita un usuario en la base de datos
     * @param string $email Email del usuario
     * @param string $nombre_usuario Nombre de usuario
     * @param string $nombre_completo Nombre completo del usuario
     * @param string $contrasena Contraseña del usuario
     * @param int $telefono Número de teléfono del usuario
     * @param string $direccion Dirección del usuario
     * @param string $rol Rol del usuario (ej. admin, usuario)
     */
    public function edit(string $email, string $nombre_usuario, string $nombre_completo, int $telefono, string $direccion, string $rol)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE usuarios 
               SET email = :email, 
                   nombre_usuario = :nombre_usuario, 
                   nombre_completo = :nombre_completo, 
                   telefono = :telefono, 
                   direccion = :direccion, 
                   rol = :rol 
               WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'email' => $email,
            'nombre_usuario' => $nombre_usuario,
            'nombre_completo' => $nombre_completo,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'rol' => $rol,
            'id' => $this->id,
        ]);
    }

    /**
     * Elimina esta instancia de la base de datos de la tabla usuarios
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM usuarios WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
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
     * Get the value of nombre_usuario
     */
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Set the value of nombre_usuario
     *
     * @return  self
     */
    public function setNombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }

    /**
     * Get the value of nombre_completo
     */
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Set the value of nombre_completo
     *
     * @return  self
     */
    public function setNombre_completo($nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;

        return $this;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of contrasena
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     *
     * @return  self
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
