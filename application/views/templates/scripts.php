<!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
   
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?= base_url('assets/js/isotope.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/owl-carousel.js') ?>"></script>
    <script src="<?= base_url('assets/js/lightbox.js') ?>"></script>
    <script src="<?= base_url('assets/js/tabs.js') ?>"></script>
    <script src="<?= base_url('assets/js/video.js') ?>"></script>
    <script src="<?= base_url('assets/js/slick-slider.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
        <script>
        $(document).ready(function(){
          $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            margin: 15,
            nav: true,
            dots: true,
            responsive:{
              0:{ items:1 },
              600:{ items:2 },
              1000:{ items:3 }
            }
          });
        });
      </script>
    </script>