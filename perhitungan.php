<?php
session_start();
// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// Process sensor data if form is submitted
$hasil_perhitungan = false;
$kelembaban = 0;
$suhu = 0;
$kesuburan = 0;
$max_similarity = 0;
$hasil_solusi = '';
$kasus_terdekat = [];
$solusi = ['deskripsi_solusi' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webchili";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil data terbaru dari tabel sensor
    $query_sensor = mysqli_query($conn, "SELECT * FROM sensor ORDER BY id DESC LIMIT 1");
    $sensor_data = mysqli_fetch_assoc($query_sensor);

    if (!$sensor_data) {
        die("Error: Data sensor tidak ditemukan.");
    }

    $kelembaban = (float)$sensor_data['kelembaban'];
    $suhu = (float)$sensor_data['suhu'];
    $kesuburan = (float)$sensor_data['kesuburan'];

    // Klasifikasi gejala
    $G001 = ($kelembaban <= 30) ? 1 : 0;
    $G004 = ($kelembaban > 70) ? 1 : 0;
    $G006 = ($kelembaban > 30 && $kelembaban <= 70) ? 1 : 0;

    $G002 = ($suhu <= 20) ? 1 : 0;
    $G003 = ($suhu > 30) ? 1 : 0;
    $G005 = ($suhu > 20 && $suhu <= 30) ? 1 : 0;

    $G007 = ($kesuburan > 70) ? 1 : 0;
    $G008 = ($kesuburan > 30 && $kesuburan <= 70) ? 1 : 0;
    $G009 = ($kesuburan <= 30) ? 1 : 0;

    // Ambil data basis kasus
    $query = mysqli_query($conn, "SELECT * FROM basis_kasus");
    $bobot = [5, 3, 5, 5, 3, 3, 5, 3, 5];
    $gejala_baru = [$G001, $G002, $G003, $G004, $G005, $G006, $G007, $G008, $G009];

    // Perhitungan similarity
    $max_similarity = 0;
    $hasil_solusi = '';
    $kasus_terdekat = [];

    while ($kasus = mysqli_fetch_assoc($query)) {
        $similarity = 0;
        $total_bobot = array_sum($bobot);

        foreach ($gejala_baru as $i => $nilai) {
            $cocok = ($nilai == $kasus["G00" . ($i + 1)]) ? 1 : 0;
            $similarity += $bobot[$i] * $cocok;
        }

        $similarity /= $total_bobot;

        if ($similarity > $max_similarity) {
            $max_similarity = $similarity;
            $hasil_solusi = $kasus['solusi'];
            $kasus_terdekat = $kasus;
        }
    }

    // Ambil deskripsi solusi
    $solusi_query = mysqli_query($conn, "SELECT deskripsi_solusi FROM solusi WHERE id_solusi = '$hasil_solusi'");
    $solusi = mysqli_fetch_assoc($solusi_query);

    mysqli_close($conn);
    $hasil_perhitungan = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>ChiliCare. - Perhitungan</title>

  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      setInterval(function() {
        $("#ceksuhu").load("ceksuhu.php");
        $("#cekkelembaban").load("cekkelembaban.php");
        $("#cekkesuburan").load("cekkesuburan.php");
      }, 1500);
    });
  </script>

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    .calculation-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      background-color: #f9f9f9;
      text-align: center;
    }
    .calculation-card h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }
    .calculation-card h1 {
      font-size: 48px;
      margin: 0;
      color: #333;
    }
    .btn-primary {
      background-color: #0066cc;
      border-color: #005bb5;
    }
    .btn-primary:hover {
      background-color: #005bb5;
      border-color: #004f99;
    }
  </style>
</head>

<body class="services-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/chilicare.png" alt="ChiliCare Logo" style="height: 100px; width: auto; margin-right: 10px;">
        <h1 class="sitename">ChiliCare.</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="perawatan.php">Perawatan</a></li>
          <li><a href="petunjuk.php">Petunjuk</a></li>
          <li><a href="perhitungan.php" class="active">Perhitungan</a></li>
          <li><a href="pengembang.php">Pengembang</a></li>
          <?php
          if (isset($_SESSION['user_id'])) {
            echo '<li><a href="logout.php">Logout</a></li>';
          }
          ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <div class="page-title light-background">
      <div class="container">
        <h1>Perhitungan Kondisi Tanaman Cabai</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Perhitungan</li>
          </ol>
        </nav>
      </div>
    </div>

    <section id="calculation-form" class="calculation-form section">
      <div class="container">
        <h2 class="text-center">Monitoring dan Perawatan Tanaman Cabai</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="calculation-card">
              <h2>Suhu</h2>
              <h1><span id="ceksuhu">0</span> °C</h1>
            </div>
          </div>
          <div class="col-md-4">
            <div class="calculation-card">
              <h2>Kelembaban</h2>
              <h1><span id="cekkelembaban">0</span> %</h1>
            </div>
          </div>
          <div class="col-md-4">
            <div class="calculation-card">
              <h2>Kesuburan</h2>
              <h1><span id="cekkesuburan">0</span> Ph</h1>
            </div>
          </div>
        </div>

        <form action="perhitungan.php" method="POST" class="mt-4">
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Hitung Kondisi</button>
          </div>
        </form>

        <?php if ($hasil_perhitungan) : ?>
          <div class="mt-5">
            <h3>Hasil Perhitungan</h3>
            <p><strong>Suhu:</strong> <?= $suhu ?> °C</p>
            <p><strong>Kelembaban:</strong> <?= $kelembaban ?> %</p>
            <p><strong>Kesuburan:</strong> <?= $kesuburan ?> Ph</p>
            <p><strong>Similarity:</strong> <?= $max_similarity ?></p>
            <h4>Solusi:</h4>
            <p><?= $solusi['deskripsi_solusi'] ?></p>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/chilicare.png" alt="ChiliCare Logo" style="height: 100px; width: auto; margin-right: 10px;">
            <h1 class="sitename">ChiliCare.</h1>
          </a>
          <p>Platform solusi lengkap untuk merawat tanaman cabai Anda.</p>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Link Tautan</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="perawatan.php">Perawatan</a></li>
            <li><a href="petunjuk.php">Petunjuk</a></li>
            <li><a href="perhitungan.php">Perhitungan</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><a href="#">Perawatan Tanaman</a></li>
            <li><a href="#">Pengendalian Hama</a></li>
            <li><a href="#">Penyuluhan</a></li>
            <li><a href="#">Pemantauan Tanaman</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak Kami</h4>
            <strong>Phone:</strong> +62 274 123456<br>
            <strong>Email:</strong> info@chilicare.com<br>
          </p>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; 2024 <strong>ChiliCare.</strong> All Rights Reserved.
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>

