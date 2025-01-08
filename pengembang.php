<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>ChiliCare. - Pengembang</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Active
  * Template URL: https://bootstrapmade.com/active-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="team-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="assets/img/chilicare.png" alt="ChiliCare Logo" style="display: block; height: 100px; width: auto; margin-right: 10px;">
        <h1 class="sitename">ChiliCare.</h1>
      </a>

      <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php">Home</a></li>
          <li><a href="about.php" class="active">About</a></li>
          <li><a href="perawatan.php">Perawatan</a></li>
          <li><a href="petunjuk.php">Petunjuk</a></li>
          <li><a href="perhitungan.php">Perhitungan</a></li>
          <li><a href="pengembang.php">Pengembang</a></li>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Team</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Team</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Team Section -->
    <section id="team" class="team section">

      <div class="site-section slider-team-wrap">
        <div class="container">

          <div class="slider-nav d-flex justify-content-end mb-3">
            <a href="#" class="js-prev js-custom-prev"><i class="bi bi-arrow-left-short"></i></a>
            <a href="#" class="js-next js-custom-next"><i class="bi bi-arrow-right-short"></i></a>
          </div>

          <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "1",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "navigation": {
                  "nextEl": ".js-custom-next",
                  "prevEl": ".js-custom-prev"
                },
                "breakpoints": {
                  "640": {
                    "slidesPerView": 2,
                    "spaceBetween": 30
                  },
                  "768": {
                    "slidesPerView": 3,
                    "spaceBetween": 30
                  },
                  "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 30
                  }
                }
              }
            </script>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="assets/img/team/team1.jpeg" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href="#"><span class="">Alif</span> Nafiantoro</a>
                  </h3>
                  <span class="d-block position">Ketua, 21330011.</span>
                  <p>
                    Separated they live in. Separated they live in Bookmarksgrove
                    right at the coast of the Semantics, a large language ocean.
                  </p>
                  <p class="mb-0">
                    <a href="#" class="more dark">Learn More <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="assets/img/team/team2.jpg" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href="#"><span class="">Venesse Kaylasha</span> Alvino</a>
                  </h3>
                  <span class="d-block position">Anggota, 21330007.</span>
                  <p>
                    Separated they live in. Separated they live in Bookmarksgrove
                    right at the coast of the Semantics, a large language ocean.
                  </p>
                  <p class="mb-0">
                    <a href="#" class="more dark">Learn More <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="assets/img/team/team3.JPG" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href="#"><span class="">Icang Dwi Rizqi</span> Setyawan</a>
                  </h3>
                  <span class="d-block position">Anggota, 21330035.</span>
                  <p>
                    Separated they live in. Separated they live in Bookmarksgrove
                    right at the coast of the Semantics, a large language ocean.
                  </p>
                  <p class="mb-0">
                    <a href="#" class="more dark">Learn More <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="assets/img/team/team4.jpeg" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href="#"><span class="">Yumarlin</span> MZ. S.Kom., M.Kom.</a>
                  </h3>
                  <span class="d-block position">CEO, Founder, Atty.</span>
                  <p>
                    Separated they live in. Separated they live in Bookmarksgrove
                    right at the coast of the Semantics, a large language ocean.
                  </p>
                  <p class="mb-0">
                    <a href="#" class="more dark">Learn More <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <!-- <div class="swiper-slide"></div> -->
            </div>
          </div>
        </div>
        <!-- /.container -->
      </div>
    </section><!-- /Team Section -->

  </main>

  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
          <div class="widget">

            <p class="mb-0">
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 ps-lg-5 mb-3 mb-md-0">
          <div class="widget">
          </div>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5">
          <div class="widget">
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5">
          <div class="widget">

          </div>

          <div class="widget">
            <div class="footer-subscribe">
              <form action="forms/newsletter.php" method="post" class="php-email-form">
                <div class="mb-2">
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="copyright d-flex flex-column flex-md-row align-items-center justify-content-md-between">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Active.</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by <a href="https://bootstrapmade.com/">Universitas Janabadra - Informatika</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>