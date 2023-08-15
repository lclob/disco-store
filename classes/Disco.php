<?PHP

class Disco
{

  private $id;
  private $titulo;
  private $canciones_cantidad;
  private $publicacion;
  private $origen;
  private $bajada;
  private $portada;
  private $precio;
  private $productor;
  private $genero_id;
  private $artista;

  private static $createValues = ['id', 'titulo', 'canciones_cantidad', 'publicacion', 'origen', 'bajada', 'portada', 'precio', 'productor'];

  /**
   * Devuelve una instancia del objeto Disco, con todas sus propiedades configuradas
   *@return Disco
   */
  private function createDisco($discoData): Disco
  {

    $disco = new self();
    foreach (self::$createValues as $value) {
      $disco->{$value} = $discoData[$value];
    }

    $disco->genero_id = (new Genero())->get_x_id(intval($discoData['genero_id']));

    $AIds = !empty($discoData['artista']) ? explode(",", $discoData['artista']) : [];
    $artista = [];
    if (!empty($AIds[0])) {
      foreach ($AIds as $AId) {
        $artista[] = (new Artista())->get_x_id(intval($AId));
      }
    }
    $disco->artista = $artista;

    return $disco ?? false;
  }

  /**
   * Inserta un nuevo disco a la base de datos
   * @param string $titulo
   * @param int $genero_id
   * @param int $canciones_cantidad
   * @param string $productor
   * @param string $publicacion El dia de publicación en formato YYYY-DD-MM
   * @param string $bajada 
   * @param string $origen 
   * @param string $portada ruta a un archivo .jpg o .png 
   * @param float $precio   
   */
  public function insert($titulo, $genero_id, $canciones_cantidad, $productor, $publicacion, $origen, $bajada, $portada, $precio)
  {

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO disco VALUES (NULL, :titulo, :genero_id, :canciones_cantidad, :productor, :publicacion, :origen, :bajada, :portada, :precio)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
      [
        'genero_id' => $genero_id,
        'titulo' => $titulo,
        'canciones_cantidad' => $canciones_cantidad,
        'publicacion' => $publicacion,
        'origen' => $origen,
        'bajada' => $bajada,
        'portada' => $portada,
        'precio' => $precio,
        'productor' => $productor
      ]
    );

    return $conexion->lastInsertId();
  }

  /**
   * Edita un disco y lo guarda en la base de datos
   * @param string $titulo
   * @param int $genero_id
   * @param int $canciones_cantidad
   * @param string $productor
   * @param string $publicacion El dia de publicación en formato YYYY-DD-MM
   * @param string $bajada 
   * @param string $origen 
   * @param string $portada ruta a un archivo .jpg o .png 
   * @param float $precio   
   */
  public function edit($genero_id, $titulo, $canciones_cantidad, $publicacion, $origen, $bajada, $portada, $precio, $productor)
  {

    $conexion = Conexion::getConexion();
    $query = "UPDATE disco SET
         genero_id = :genero_id,
         titulo = :titulo,
         canciones_cantidad = :canciones_cantidad,
         publicacion = :publicacion,
         origen = :origen,
         bajada = :bajada,
         portada = :portada,      
         precio = :precio,
         productor = :productor
        WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
      [
        'id' => $this->id,
        'genero_id' => $genero_id,
        'titulo' => $titulo,
        'canciones_cantidad' => $canciones_cantidad,
        'publicacion' => $publicacion,
        'origen' => $origen,
        'bajada' => $bajada,
        'portada' => $portada,
        'precio' => $precio,
        'productor' => $productor
      ]
    );
  }

  /**
   * Elimina esta instancia de la base de datos
   */
  public function delete()
  {
    $conexion = Conexion::getConexion();
    $query = "DELETE FROM disco WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([$this->id]);
  }

  /**
   * Crea un vinculo entre un disco y un artista 
   * @param int $disco_id
   * @param int $artista_id
   */
  public function add_artista(int $disco_id, int $artista_id)
  {

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO artista_x_disco VALUES (NULL, :disco_id, :artista_id)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
      [
        'disco_id' => $disco_id,
        'artista_id' => $artista_id
      ]
    );
  }

  /**
   * Vaciar lista de artistas
   * @param int $disco_id
   */
  public function clear_artista()
  {
    $conexion = Conexion::getConexion();
    $query = "DELETE FROM artista_x_disco WHERE disco_id = :disco_id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
      [
        'disco_id' => $this->id
      ]
    );
  }

  /**
   * Devuelve el catálgo completo
   */
  public function catalogo_completo(): array
  {
    $conexion = Conexion::getConexion();
    $query = "SELECT disco.*, GROUP_CONCAT(DISTINCT artista_x_disco.artista_id) AS artista FROM disco LEFT JOIN artista_x_disco ON artista_x_disco.disco_id = disco.id GROUP BY disco.id;";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();

    $catalogo = [];

    while ($result = $PDOStatement->fetch()) {
      $catalogo[] = $this->createDisco($result);
    }

    return $catalogo ?? false;
  }

  /**
   * Devuelve el catalogo de productos de un genero en particular
   * @param string $genero_id Un integer con el id del genero a buscar
   * @return Disco[] Un Array lleno de instancias de objeto Disco.
   */
  public function catalogo_x_genero(int $genero_id): array
  {

    $conexion = Conexion::getConexion();

    $query = "SELECT disco.*, GROUP_CONCAT(DISTINCT artista_x_disco.artista_id) AS artista FROM disco LEFT JOIN artista_x_disco ON artista_x_disco.disco_id = disco.id WHERE genero_id = ? GROUP BY disco.id;";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$genero_id]);

    $catalogo = [];

    while ($result = $PDOStatement->fetch()) {
      $catalogo[] = $this->createDisco($result);
    }

    return $catalogo ?? false;
  }

  /**
   * Devuelve el catalogo de productos de un artista en particular
   * @param string $artista Un string con el nombre del artista a buscar
   * @return Disco[] Un Array lleno de instancias de objeto Disco.
   */
  public function catalogo_x_artista(int $artista_id): array
  {

    $catalogo = [];

    $conexion = Conexion::getConexion();
    $query = "SELECT disco.*, GROUP_CONCAT(DISTINCT artista_x_disco.artista_id) AS artista FROM disco LEFT JOIN artista_x_disco ON artista_x_disco.disco_id = disco.id WHERE artista_id = ? GROUP BY disco.id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$artista_id]);

    $catalogo = [];

    while ($result = $PDOStatement->fetch()) {
      $catalogo[] = $this->createDisco($result);
    }

    return $catalogo ?? false;
  }

  /**
   * Devuelve el catálogo de productos para un año de publicación específico.
   * @param string $anio El año de publicación en formato YYYY.
   * @return Disco[] Un array lleno de instancias del objeto Disco.
   */
  public function catalogo_x_anio(string $anio): array
  {
    $catalogo = [];
    $conexion = Conexion::getConexion();
    $query = "SELECT disco.*, GROUP_CONCAT(DISTINCT artista_x_disco.artista_id) AS artista FROM disco LEFT JOIN artista_x_disco ON artista_x_disco.disco_id = disco.id WHERE YEAR(publicacion) = ? GROUP BY disco.id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$anio]);

    $catalogo = [];

    while ($result = $PDOStatement->fetch()) {
      $catalogo[] = $this->createDisco($result);
    }

    return $catalogo;
  }

  /**
 * Devuelve el catálogo de productos ordenado por mayor o menor precio.
 * @param string $orden El orden de los resultados. Puede ser "menor" o "mayor".
 * @return Disco[] Un array lleno de instancias del objeto Disco.
 */
public function catalogo_x_precio(string $orden): array
{
    $catalogo = [];
    $conexion = Conexion::getConexion();

    // Determina el orden de la consulta SQL
    $ordenSQL = ($orden === 'menor') ? 'ASC' : 'DESC';

    $query = "SELECT disco.*, GROUP_CONCAT(DISTINCT artista_x_disco.artista_id) AS artista FROM disco LEFT JOIN artista_x_disco ON artista_x_disco.disco_id = disco.id GROUP BY disco.id ORDER BY disco.precio $ordenSQL";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();

    $catalogo = []; 

    while ($result = $PDOStatement->fetch()) {
        $catalogo[] = $this->createDisco($result);
    }

    return $catalogo;
}

  /**
   * Devuelve los datos de un producto en particular.
   * @param int $idProducto El ID único del producto a mostrar.
   * @return Disco Una instancia del objeto Disco con los datos del producto.
   */
  public function producto_x_id(int $idProducto): Disco
  {
    $conexion = Conexion::getConexion();
    $query = "SELECT disco.*, GROUP_CONCAT(artista_x_disco.artista_id) AS artista FROM disco LEFT JOIN artista_x_disco ON artista_x_disco.disco_id = disco.id WHERE disco.id = ? GROUP BY disco.id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$idProducto]);

    $result = $PDOStatement->fetch();

    return $this->createDisco($result);
  }

  /**
   * Obtiene la portada de todos los discos de la base de datos.
   * @return array Un array de rutas de las portadas de los discos.
   */
  public static function obtenerPortadas(): array
  {
    $conexion = Conexion::getConexion();
    $query = "SELECT portada FROM disco";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();

    $portadas = [];

    while ($result = $PDOStatement->fetch()) {
      $portadas[] = $result['portada'];
    }

    return $portadas;
  }


  /**
   * Devuelve el precio de la unidad, formateado correctamente
   */
  public function precio_formateado(): string
  {
    return number_format($this->precio, 2, ",", ".");
  }

  /**
   * Esta función devuelve las primeras x palabras de un párrafo 
   * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional)
   */
  public function bajada_reducida(int $cantidad = 10): string
  {
    $texto = $this->bajada;

    $array = explode(" ", $texto);
    if (count($array) <= $cantidad) {
      $resultado = $texto;
    } else {
      array_splice($array, $cantidad);
      $resultado = implode(" ", $array) . "...";
    }

    return $resultado;
  }

  /**
   * Get the value of artista
   */
  public function getArtista()
  {
    return $this->artista;
  }

  /**
   * Get the value of serie
   */
  public function getGenero()
  {
    return $this->genero_id;
  }

  /**
   * Get the value of canciones
   */
  public function getCanciones()
  {
    return $this->canciones_cantidad;
  }

  /**
   * Get the value of titulo
   */
  public function getTitulo()
  {
    return $this->titulo;
  }

  /**
   * Get the value of origen
   */
  public function getOrigen()
  {
    return $this->origen;
  }

  /**
   * Get the value of publicacion
   */
  public function getPublicacion()
  {
    return $this->publicacion;
  }

  /**
   * Get the value of productor
   */
  public function getProductor()
  {
    return $this->productor;
  }

  /**
   * Get the value of bajada
   */
  public function getBajada()
  {
    return $this->bajada;
  }

  /**
   * Get the value of portada
   */
  public function getPortada()
  {
    return $this->portada;
  }

  /**
   * Get the value of precio
   */
  public function getPrecio()
  {
    return $this->precio;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Devuelve un array compuesto por IDs de todos los artistas
   */
  public function artista_ids(): array
  {
    $result = [];
    foreach ($this->artista as $value) {
      $result[] = intval($value->getId());
    }
    return $result;
  }
}
