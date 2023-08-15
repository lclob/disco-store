<?PHP
require_once "functions/autoload.php";

$secciones_validas = [
  "home" => [
    "titulo" => "Bienvenidos",
    "restringido" => FALSE
  ],
  "historia" => [
    "titulo" => "¿Quienes Somos?",
    "restringido" => FALSE
  ],
  "discos" => [
    "titulo" => "Nuestros discos",
    "restringido" => FALSE
  ],
  "artistas" => [
    "titulo" => "Nuestros artistas",
    "restringido" => FALSE
  ],
  "producto" => [
    "titulo" => "Detalle de producto",
    "restringido" => FALSE
  ],
  "contacto" => [
    "titulo" => "Newsletter",
    "restringido" => FALSE
  ],
  "alumno" => [
    "titulo" => "Datos alumno",
    "restringido" => FALSE
  ],
  "carrito" => [
    "titulo" => "Carrito de compras",
    "restringido" => FALSE
  ],
  "procesar_datos_post" => [
    "titulo" => "Datos usuario",
    "restringido" => FALSE
  ],
  "login" => [
    "titulo" => "Inicio de Sesión",
    "restringido" => FALSE
  ],
  "panel_usuario" => [
    "titulo" => "Panel de Usuario",
    "restringido" => TRUE
  ],
  "finalizar_pago" => [
    "titulo" => "Finalizar Pago",
    "restringido" => TRUE
  ]
];

// null coalesce. Unicamente en PHP 7+
$seccion = $_GET['sec'] ?? "home";

if (!array_key_exists($seccion, $secciones_validas)) {
  $vista = "404";
  $titulo = "404 - Página no encontrada";
} else {
  $vista = $seccion;

  if ($secciones_validas[$seccion]['restringido']) {
    (new Autenticacion())->verify(FALSE);
  }

  $titulo = $secciones_validas[$seccion]['titulo'];
}

$userData = $_SESSION['loggedIn'] ?? FALSE;

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

  <!-- styles -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link href="styles.css" rel="stylesheet">
  <link href="vcard.css" rel="stylesheet">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/slick-theme.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <!-- scripts -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/slick.min.js"></script>

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
        <li class="nav-item active">
          <a class="nav-link active" href="index.php?sec=carrito">Carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?sec=alumno">Alumno</a>
        </li>
        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
          <a class="nav-link active" href="admin/?sec=dashboard">Admin</a>
        </li>
        <li class="nav-item <?= $userData ? "d-none" : "" ?>">
          <a class="nav-link active" href="index.php?sec=login">Login</a>
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
    <p class="text-dark">disco-store</p>
  </footer>
</body>

</html>