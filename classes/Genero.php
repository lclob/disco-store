<?PHP

class Genero
{

  private $id;
  private $nombre;

  /**
   * Inserta un nuevo genero a la base de datos
   * @param string $nombre
   */
  public function insert(string $nombre)
  {

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO `genero` (`id`, `nombre`) VALUES (NULL, :nombre)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
      [
        'nombre' => $nombre
      ]
    );
  }

  /**
   * Edita los datos de un genero en la base de datos
   * @param string $nombre
   */
  public function edit($nombre)
  {
    $conexion = Conexion::getConexion();
    $query = "UPDATE genero SET nombre = :nombre WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
      [
        'id' => $this->id,
        'nombre' => $nombre
      ]
    );
  }

  /**
   * Elimina esta instancia de la base de datos
   */
  public function delete()
  {
    $conexion = Conexion::getConexion();
    $query = "DELETE FROM genero WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([$this->id]);
  }

  /**
   * Devuelve un array con objetos Genero
   */
  public function get_generos()
  {
    $conexion = (new Conexion())->getConexion();
    $query = "SELECT * FROM genero";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $result = $PDOStatement->fetchAll();

    return $result ?? null;
  }

  /**
   * Devuelve los datos de un genero en particular
   * @param int $id El ID único del genero 
   */
  public function get_x_id(int $id)
  {
    $conexion = (new Conexion())->getConexion();
    $query = "SELECT * FROM genero WHERE id = $id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $result = $PDOStatement->fetch();


    return $result ?? null;
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
}
