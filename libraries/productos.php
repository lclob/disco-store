<?PHP

/**
 * Devuelve el catálgo completo
 * @return array - Un array con el catálogo completo de productos en stock
 */
function catalogo_completo(): array
{
  $catalogoJSON = file_get_contents('data/productos.json');
  $resultado = json_decode($catalogoJSON, TRUE);

  return $resultado;
}

/**
 * Devuelve el catalogo de productos de un personaje en particular
 * @param string $nombre Un string con el nombre del artista a buscar
 * 
 * @return array Un array con todos los vinilos de ese artista en stock.
 */
function catalogo_x_personaje(string $nombre): array
{

  $resultado = [];
  $catalogo = catalogo_completo();

  foreach ($catalogo as $n) {
    if ($n['nombre'] == $nombre) {
      $resultado[] = $n;
    }
  }

  return $resultado;
}

/**
 * Devuelve los datos de un producto en particular
 * @param int $idProducto El ID único del producto a mostrar 
 * 
 * @return mixed Un array con los datos del producto encontrado O null en caso que no se encuentre niguno.
 */
function producto_x_id(int $idProducto): mixed
{

  $catalogo = catalogo_completo();

  foreach ($catalogo as $p) {
    if ($p['id'] == $idProducto) {
      return $p;
    }
  }

  return null;
}