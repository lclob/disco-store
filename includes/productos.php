<?PHP

/**
 * Devuelve el catálgo completo
 * @return array - Un array con el catálogo completo de productos en stock
 */
function catalogo_completo(): array
{
    $catalogoJSON = file_get_contents('datos/productos.json');
    $resultado = json_decode($catalogoJSON, TRUE);

    return $resultado;
}