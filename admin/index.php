<?PHP
require_once "../functions/autoload.php";

$secciones_validas = [
  "login" => [
    "titulo" => "Inicio de Sesión",
    "restringido" => FALSE
  ],
  "dashboard" => [
    "titulo" => "Panel de administración",
    "restringido" => TRUE
  ],
  "admin_discos" => [
    "titulo" => "Administrar discos",
    "restringido" => TRUE
  ],
  "admin_artistas" => [
    "titulo" => "Administrar Artistas",
    "restringido" => TRUE
  ],
  "admin_generos" => [
    "titulo" => "Administrar Generos",
    "restringido" => TRUE
  ],
  "add_disco" => [
    "titulo" => "Agregar discos",
    "restringido" => TRUE
  ],
  "add_artista" => [
    "titulo" => "Agregar artistas",
    "restringido" => TRUE
  ],
  "add_genero" => [
    "titulo" => "Agregar artistas",
    "restringido" => TRUE
  ],
  "edit_artista" => [
    "titulo" => "Editar datos de artistas",
    "restringido" => TRUE
  ],
  "edit_disco" => [
    "titulo" => "Editar datos de Dsico",
    "restringido" => TRUE
  ],
  "edit_genero" => [
    "titulo" => "Editar datos de Dsico",
    "restringido" => TRUE
  ],
  "delete_artista" => [
    "titulo" => "Eliminar datos de Artista",
    "restringido" => TRUE
  ],
  "delete_disco" => [
    "titulo" => "Eliminar datos de un disco",
    "restringido" => TRUE
  ],
  "delete_genero" => [
    "titulo"=> "Eliminar datos de un disco",
    "restringido" => TRUE
  ]
];

// null coalesce. Unicamente en PHP 7+
$seccion = $_GET['sec'] ?? "dashboard";

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
  <title>Disco Store :: <?= $titulo ?></title>

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../styles.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light w-100">
    <a id="logo" class="navbar-brand" href="../index.php?sec=home"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-disc" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
        <path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 4a4 4 0 0 0-4 4 .5.5 0 0 1-1 0 5 5 0 0 1 5-5 .5.5 0 0 1 0 1zm4.5 3.5a.5.5 0 0 1 .5.5 5 5 0 0 1-5 5 .5.5 0 0 1 0-1 4 4 0 0 0 4-4 .5.5 0 0 1 .5-.5z" />
      </svg>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto pt-3">
        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
          <a class="nav-link active" href="index.php?sec=dashboard">Dashboard</a>
        </li>
        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
          <a class="nav-link active" href="index.php?sec=admin_discos">Administrar Discos</a>
        </li>
        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
          <a class="nav-link active" href="index.php?sec=admin_artistas">Administrar Artistas</a>
        </li>
        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
          <a class="nav-link active" href="index.php?sec=admin_generos">Administrar Generos</a>
        </li>
        <li class="nav-item <?= $userData ? "d-none" : "" ?>">
          <a class="nav-link active" href="index.php?sec=login">Login</a>
        </li>
        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
          <a class="nav-link active" href="actions/auth_logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="admin">
    <?PHP
    require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/404.php";
    ?>
  </main>

  <footer class="text-center p-4">
    <p class="text-light">disco-store</p>
  </footer>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>