<?PHP

class Artista
{

  private $id;
  private $nombre;
  private $portada;
  private $primera_aparicion; 
  private $alias;
  private $biografia;

  /**
   * Inserta un nuevo artista a la base de datos
   * @param string $nombre
   * @param string $alias
   * @param int $primera_aparicion El año en el que el artista hizo su primera aparición (4 dígitos)
   * @param string $biografia 
   * @param string $portada ruta a un archivo .jpg o .png 
   */
  public function insert(string $nombre, string $alias, string $biografia, int $primera_aparicion, string $portada)
  {

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO `artista` (`id`, `nombre`, `alias`, `biografia`, `primera_aparicion`, `portada`) VALUES (NULL, :nombre, :alias, :biografia, :primera_aparicion, :portada)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
      [
        'nombre' => $nombre,
        'alias' => $alias,
        'biografia' => $biografia,
        'primera_aparicion' => $primera_aparicion,
        'portada' => $portada,
      ]
    );
  }

    /**
     * Edita los datos de un artista en la base de datos
     * @param string $nombre
     * @param string $alias
     * @param int $primera_aparicion El año en el que el artista hizo su primera aparición (4 dígitos)
     * @param string $biografia 
     * @param string $portada ruta a un archivo .jpg o .png 
     */
    public function edit($nombre, $alias, $biografia, $primera_aparicion, $portada)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE artista SET nombre = :nombre, alias = :alias, biografia = :biografia, primera_aparicion = :primera_aparicion, portada = :portada WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'alias' => $alias,
                'biografia' => $biografia,
                'primera_aparicion' => $primera_aparicion,
                'portada' => $portada
            ]
        );
    }

        /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM artista WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

  /**
   * Devuelve un array con objetos Artista
   */
  public function get_artistas(): array
  {
    $conexion = (new Conexion())->getConexion();
    $query = "SELECT * FROM artista";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $result = $PDOStatement->fetchAll();
  
    return $result ?? null;
  }

  /**
   * Devuelve los datos de un artista en particular
   * @param int $id El ID único del artista 
   */
  public function get_x_id(int $id): Artista
  {
    $conexion = (new Conexion())->getConexion();
    $query = "SELECT * FROM artista WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute([$id]);

    $result = $PDOStatement->fetch();

    return $result ?? null;
  }

   /**
   * Devuelve el artista de un disco en particular
   * @param int $disco_id El ID del disco a buscar
   * @return Artista|false Una instancia del objeto Artista si se encuentra, o false si no se encuentra.
   */
  public function get_artista_x_disco(int $disco_id): Artista
  {
    $conexion = Conexion::getConexion();
    $query = "SELECT artista.* FROM artista JOIN artista_x_disco ON artista_x_disco.artista_id = artista.id WHERE artista_x_disco.disco_id = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute([$disco_id]);

    $result = $PDOStatement->fetch();

    return $result ?? false;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Get the value of portada
   */
  public function getPortada()
  {
    return $this->portada;
  }

  /**
   * Get the value of alias
   */ 
  public function getAlias()
  {
    return $this->alias;
  }

  /**
   * Get the value of biografia
   */ 
  public function getBiografia()
  {
    return $this->biografia;
  }

  /**
   * Get the value of primera_aparicion
   */ 
  public function getPrimera_aparicion()
  {
    return $this->primera_aparicion;
  }
}
