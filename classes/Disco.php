<?PHP

class Disco
{

  private $id;
  private $nombre;
  private $genero;
  private $artista;
  private $titulo;
  private $publicacion;
  private $productor;
  private $canciones;
  private $bajada;
  private $portada;
  private $precio;

  /**
   * Devuelve el catálgo completo
   */
  public function catalogo_completo(): array
  {
    //echo "Soy un metodo y me estoy ejecutando, desde adentro de la clase Comic! =D";
    $catalogo = [];

    $JSON = file_get_contents('datos/productos.json');
    $JSONData = json_decode($JSON);

    foreach ($JSONData as $value) {
      $comic = new self();

      $comic->id = $value->id;
      $comic->nombre = $value->nombre;
      $comic->genero = $value->genero;
      $comic->artista = $value->artista;
      $comic->productor = $value->productor;
      $comic->titulo = $value->titulo;
      $comic->publicacion = $value->publicacion;
      $comic->canciones = $value->canciones;
      $comic->bajada = $value->bajada;
      $comic->portada = $value->portada;
      $comic->precio = $value->precio;

      $catalogo[] = $comic;
    }

    return $catalogo;
  }

  /**
   * Devuelve el catalogo de productos de un artista en particular
   * @param string $artista Un string con el nombre del artista a buscar
   * @return Disco[] Un Array lleno de instancias de objeto Comic.
   */
  public function catalogo_x_personaje(string $artista): array
  {

    $resultado = [];
    $catalogo = $this->catalogo_completo();

    foreach ($catalogo as $p) {
      if ($p->artista == $artista) {
        $resultado[] = $p;
      }
    }
    return $resultado;
  }

  /**
   * Devuelve los datos de un producto en particular
   * @param int $idProducto El ID único del producto a mostrar 
   */
  public function producto_x_id(int $idProducto): Disco
  {
    $catalogo = $this->catalogo_completo();

    foreach ($catalogo as $p) {
      if ($p->id == $idProducto) {
        return $p;
      }
    }
    return null;
  }

  /**
   * Devuelve el nombre completo de la edición
   */
  public function nombre_completo(): string
  {
    return $this->nombre;
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
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
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
    return $this->genero;
  }

  /**
   * Get the value of canciones
   */
  public function getCanciones()
  {
    return $this->canciones;
  }

  /**
   * Get the value of titulo
   */
  public function getTitulo()
  {
    return $this->titulo;
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
}
