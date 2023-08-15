<?PHP
$miObjetoSlider = new Slider;
$miObjetoDisco = new Disco;
$portadas = $miObjetoDisco->obtenerPortadas();

foreach ($portadas as $portada) {
  $miObjetoSlider->addImage($portada, 'Imagen de ' . $portada);
}
?>

<div class="d-flex justify-content-end">
  <div id="home">
    <div class="d-flex justify-content-end">
      <h1 class="mb-2 fw-bold">Rhythmic Revolutions</h1>
    </div>
    <div class="imagenes_home">
      <figure><img src="assets/img/home2.jpg"/></figure>
      <figure><img src="assets/img/home3.jpg"/></figure>
    </div>
  </div>
  <div class="home-vertical"><a href="index.php?sec=discos">disco store</a></div>   
</div>

<div class="quote py-5">
  <p class="blockquote">"Bajo la noche estrellada, los discos de vinilo despiertan emociones dormidas, susurran historias suspendidas en el tiempo y despliegan melodías que acarician el alma. Son puentes hacia mundos desconocidos, abrazos sonoros que conectan almas y revelan los secretos del corazón humano. En su danza elegante, los vinilos guardan la magia de la música y son testigos silentes de amores perdidos y emociones profundas..."
  </p>
</div>

<div class="slider_discos">
  <?PHP
  print_r($miObjetoSlider->render());
  ?>
</div>
<div class="btn_discos"><a href="index.php?sec=discos">SHOP ALL</a></div>

<div class="marquee">
  <div class="track">
    <h1>· disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · disco-store · </h1>
  </div>
</div>

<div class="contacto" >
  <?PHP
  require_once "views/contacto.php"
  ?>
</div>
