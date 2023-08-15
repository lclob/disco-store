<?PHP
class Spinner {

  public static function generateSpinner() {
      $spinner = '<div id="spinner" class="spinner-container">';
      $spinner .= '<div class="spinner"></div>';
      $spinner .= '</div>';

      return $spinner;
  }
}
?>
