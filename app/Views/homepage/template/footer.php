</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row gy-4 justify-content-between">

        <div class="col-lg-5 col-md-12 footer-info">
          <a href="<?= base_url('/'); ?>" class="logo d-flex align-items-center">
            <img src="<?= base_url('home_assets/img/logo/logo.png'); ?>" alt="">
            <span><?= $information[0]['app_name']; ?></span>
          </a>
          <p><?= $information[0]['app_description']; ?></p>
          <div class="social-links mt-3">
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span><?= $information[0]['app_copyright']; ?></span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Modified by <a href="<?= base_url('/'); ?>">CoffeeAI</a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="home_assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="home_assets/vendor/aos/aos.js"></script>
<script src="home_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="home_assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="home_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="home_assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="home_assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="home_assets/js/main.js"></script>

</body>

</html>