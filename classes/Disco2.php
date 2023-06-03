<?PHP

class Disco2
{

  private $id;
  private $nombre;
  private $genero;
  private $artista_id;
  private $titulo;
  private $publicacion;
  private $productor_id;
  private $canciones_cantidad;
  private $bajada;
  private $portada;
  private $precio;
  private $banner;
  private $origen;

  /**
   * Devuelve el catálgo completo
   */
  public function catalogo_completo(): array
  {

    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM disco";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();

    $catalogo = $PDOStatement->fetchAll();

    echo "<pre>";
    print_r($catalogo);
    echo "</pre>";

    return $catalogo;
  }
}
