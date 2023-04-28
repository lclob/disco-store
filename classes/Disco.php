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
  private $banner;

  /**
   * Devuelve el catálgo completo
   */
  public function catalogo_completo(): array
  {
    //echo "Soy un metodo y me estoy ejecutando, desde adentro de la clase Disco! =D";
    $catalogo = [];

    $JSON = file_get_contents('data/productos.json');
    $JSONData = json_decode($JSON);

    foreach ($JSONData as $value) {
      $disco = new self();

      $disco->id = $value->id;
      $disco->nombre = $value->nombre;
      $disco->genero = $value->genero;
      $disco->artista = $value->artista;
      $disco->productor = $value->productor;
      $disco->titulo = $value->titulo;
      $disco->publicacion = $value->publicacion;
      $disco->canciones = $value->canciones;
      $disco->bajada = $value->bajada;
      $disco->portada = $value->portada;
      $disco->precio = $value->precio;
      $disco->banner = $value->banner;

      $catalogo[] = $disco;
    }

    return $catalogo;
  }

  /**
   * Devuelve el catalogo de productos de un artista en particular
   * @param string $artista Un string con el nombre del artista a buscar
   * @return Disco[] Un Array lleno de instancias de objeto Disco.
   */
  public function catalogo_x_artista(string $artista): array
  {

    $resultado = [];
    $catalogo = $this->catalogo_completo();

    foreach ($catalogo as $p) {
      if ($p->nombre == $artista) {
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
   * Devuelve el valor de banner
   */
  public function getbanner(): bool
  {
    return $this->banner;
  }

  /**
   * Devuelve los datos del producto banner, el cual se utiliza para mostrar a cada artista en la seccion artistas
   * 
   * @return Disco[] Un array de objetos con datos de cada producto banner
   */
  public function artista(): array
  {
    $arrayArtistas = [];
    $catalogo = $this->catalogo_completo();

    foreach ($catalogo as $artista) {
      if ($artista->banner) {
        $arrayArtistas[] = $artista;
      }
    }

    return $arrayArtistas;
  }

   /**
   * Devuelve el catalogo de productos dependiendo la cantidad de canciones.
   * @param int $anio Esta es la cantidad de canciones.
   * @return Disco[] Un Array lleno de instancias de objeto Disco.
   */
  public function catalogo_x_anio(int $anio): array
  {

    $resultado = [];
    $catalogo = $this->catalogo_completo();

    foreach ($catalogo as $p) {
      if ($p->publicacion == $anio) {
        $resultado[] = $p;
      };
    };
    return $resultado;
  }

  /**
   * Devuelve el catalogo de productos dependiendo de el genero.
   * @param string $genero Este es el genero.
   * @return Disco[] Un Array lleno de instancias de objeto Disco.
   */
  public function catalogo_x_genero(string $genero): array
  {

    $resultado = [];
    $catalogo = $this->catalogo_completo();

    foreach ($catalogo as $p) {
      if ($p->genero == $genero) {
        $resultado[] = $p;
      }
    }
    return $resultado;
  }

  /**
   * Devuelve los generos de los discos.
   * @return Disco[] Un Array lleno de instancias de objeto Disco.
   */
  public function genero(): array
  {

    $resultado = [];
    $catalogo = $this->catalogo_completo();

    foreach ($catalogo as $p) {
      $resultado[] = $p->genero;
    }
    return $resultado;
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
    $precioFormat = number_format($this->precio, 2, ",", ".");
    return $precioFormat;
  }



  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }
}
