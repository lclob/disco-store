<?PHP
require_once "classes/Disco.php";

$secciones_validas = [
  "home" => [
    "titulo" => "Bienvenidos"
  ],
  "historia" => [
    "titulo" => "¿Quienes Somos?"
  ],
  "contacto" => [
    "titulo" => "Newsletter"
  ],
  "discos" => [
    "titulo" => "Nuestros discos"
  ],
  "artistas" => [
    "titulo" => "Nuestros artistas"
  ],
  "producto" => [
    "titulo" => "Detalle de producto"
  ]
];

// null coalesce. Unicamente en PHP 7+
// $seccion = isset($_GET['sec']) ? $_GET['sec'] : "home";
$seccion = $_GET['sec'] ?? "home";

if (!array_key_exists($seccion, $secciones_validas)) {
  $vista = "404";
  $titulo = "404 - Página no encontrada";
} else {
  $vista = $seccion;
  $titulo = $secciones_validas[$seccion]['titulo'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disco Store ::
    <?= $titulo ?>
  </title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link href="styles.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light w-100">
    <a id="logo" class="navbar-brand" href="index.php?sec=home"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-disc" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
        <path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 4a4 4 0 0 0-4 4 .5.5 0 0 1-1 0 5 5 0 0 1 5-5 .5.5 0 0 1 0 1zm4.5 3.5a.5.5 0 0 1 .5.5 5 5 0 0 1-5 5 .5.5 0 0 1 0-1 4 4 0 0 0 4-4 .5.5 0 0 1 .5-.5z" />
      </svg>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto pt-3">
        <li class="nav-item">
          <a class="nav-link active" href="index.php?sec=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?sec=artistas">Artistas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" href="index.php?sec=discos">Discos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?sec=historia">Historia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?sec=contacto">Contacto</a>
        </li>
      </ul>
    </div>
  </nav>

  <main>
    <?PHP
    require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/404.php";
    ?>
  </main>

  <footer class="text-center p-4">
    <p class="text-light">disco-store</p>
  </footer>

  <script src="assets/js/bootstrap.bundle.min.js" ></script>
</body>

</html>