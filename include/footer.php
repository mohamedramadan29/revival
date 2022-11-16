  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>
  <script src="<?php echo $js; ?>jquery.min.js"></script>
  <script src="<?php echo $js; ?>jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo $js; ?>popper.min.js"></script>
  <script src="<?php echo $js; ?>bootstrap.min.js"></script>
  <script src="<?php echo $js; ?>jquery.easing.1.3.js"></script>
  <script src="<?php echo $js; ?>jquery.waypoints.min.js"></script>
  <script src="<?php echo $js; ?>jquery.stellar.min.js"></script>
  <script src="<?php echo $js; ?>owl.carousel.min.js"></script>
  <script src="<?php echo $js; ?>jquery.magnific-popup.min.js"></script>
  <!-- SCRIPT TO UPLOAD FILES  -->
  <script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
  <!-- START CHAT PLUGIN -->
  <script src="//code.tidio.co/yk7s2q6avmmuy5j2mb6av5ecrapjimy0.js" async></script>
  <script src="<?php echo $js; ?>aos.js"></script>
  <script src="<?php echo $js; ?>jquery.animateNumber.min.js"></script>
  <script src="<?php echo $js; ?>bootstrap-datepicker.js"></script>
  <script src="<?php echo $js; ?>jquery.timepicker.min.js"></script>
  <script src="<?php echo $js; ?>scrollax.min.js"></script>
  <script src="<?php echo $js; ?>counterup.min.js"></script>
  <script src="<?php echo $js; ?>intlTelInput.js"></script>
  <!-- START UPLOAD IMAGE SCRIPT -->

  <script type="257be86a981729866f2fa61c-text/javascript">
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-83834093-1', 'auto');
    ga('send', 'pageview');
  </script>
  <!-- END UPLOAD IMAGE SCRIPT -->
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "<?php echo $js; ?>utils.js",
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="<?php echo $js; ?>jquery.countdown.min.js"></script>
  <script src="<?php echo $js; ?>jquery.touchSwipe.min.js"></script>
  <script src="<?php echo $js; ?>upload_files.js"></script>
  <!--<script src="<?php echo $js; ?>upload_files3.js"></script> -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>

  <!-- START UPLOAD FILES WITH FILEPOND PLUGIN -->
  <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

  <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>



  <!-- START SCRIPT TO UPLOAD FILES  -->
  <script>
    $(function() {
      $(document).ready(function() {
        var percent = $('#percent');
        var status = $('#status');

        $('.ajax_form').ajaxForm({
          beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            percent.html(percentVal);
            $(".main_button").attr('disabled', false);
          },
          uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            percent.html(percentVal);
            $("#percent").html(percentVal);
            $("#percent").width(percentVal);
            $(".main_button").attr('disabled', 'disabled');
          },
          complete: function(xhr) {
            status.html(xhr.responseText);
            $(".main_button").attr('disabled', false);
          },
          success: function() {

          }
        });
      });
    });
  </script>

  <!-- END SCRIPT TO UPLOAD FILES  -->
  <!-- END UPLOAD FILES WITH FILEPOND PLUGIN -->

  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
  <script src="<?php echo $js; ?>google-map.js"></script>
  <script src="<?php echo $js; ?>main.js"></script>


  </body>

  </html>