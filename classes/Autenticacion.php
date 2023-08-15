<?PHP

class Autenticacion
{

  /**
   * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
   * @param string $username El nombre de usuario provisto
   * @param string $username El password provisto
   * @return bool Devuelve TRUE en caso que las credenciales sean correctas, FALSE en caso de que no lo sean
   */
  public function log_in(string $usuario, string $password): mixed
  {
    $datosUsuario = (new Usuario())->usuario_x_username($usuario);

    if ($datosUsuario) {
      if (password_verify($password, $datosUsuario->getPassword())) {
        $datosLogin['username'] = $datosUsuario->getNombre_usuario();
        $datosLogin['id'] = $datosUsuario->getId();
        $datosLogin['rol'] = $datosUsuario->getRol();
        $_SESSION['loggedIn'] = $datosLogin;
        return $datosLogin['rol'];
      } else {
        (new Alerta())->add_alerta('danger', "El password ingresado no es correcto.");
        return FALSE;
      }
    } else {
      (new Alerta())->add_alerta('warning', "El usuario ingresado no se encontró en nuestra base de datos.");
      return NULL;
    }
  }


  public function log_out()
  {
    if (isset($_SESSION['loggedIn'])) {
      unset($_SESSION['loggedIn']);
    };
  }

  public function verify($admin = TRUE): bool
  {
    if (isset($_SESSION['loggedIn'])) {
      if ($admin) {
        if ($_SESSION['loggedIn']['rol'] == "admin" or $_SESSION['loggedIn']['rol'] == "superadmin") {
          return TRUE;
        } else {
          (new Alerta())->add_alerta('warning', "El usuario no tiene permisos para ingresar a este area");
          header('location: ../../index.php?sec=login');
        }
      } else {
        return TRUE;
      }
    } else {
      (new Alerta())->add_alerta('warning', "El usuario no tiene permisos para ingresar a este area");
      header('location: ../../index.php?sec=login');
    }
  }
}
