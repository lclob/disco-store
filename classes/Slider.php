<?PHP

class Slider {
    private $images = [];

    public function addImage($src, $alt = '') {
        $this->images[] = [
            'src' => 'imagenes_discos/'.$src,
            'alt' => $alt
        ];
    }

    public function render() {
        $output = '<div class="slick_slider">';
        foreach ($this->images as $image) {
            $output .= '<div><img src="' . $image['src'] . '" alt="' . $image['alt'] . '"></div>';
        }
        $output .= '</div>';

        $output .= '
            <script type="text/javascript">
                $(document).ready(function(){
                  $(".slick_slider").slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    arrows: false,
                    dots: true,
                    responsive: [
                      {
                        breakpoint: 768,
                        settings: {
                          arrows: false,
                          slidesToShow: 3,
                          slidesToScroll: 3,
                        }
                      },
                      {
                        breakpoint: 480,
                        settings: {
                          arrows: false,
                          slidesToShow: 1,
                          slidesToScroll: 1,
                          dots: false,
                        }
                      }
                    ]
                  });
                });
            </script>';

        return $output;
    }
}
