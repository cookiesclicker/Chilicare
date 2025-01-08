<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>ChiliCare. - Login</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  
  <style>
    /* Custom CSS for Login Form */
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 30px;
      background-color: #f8f9fa;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      font-size: 24px;
      margin-bottom: 20px;
      font-weight: 500;
      text-align: center;
    }

    .login-container .form-control {
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .login-container .btn-primary {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      font-weight: 500;
    }

    .login-container .forgot-password {
      display: block;
      text-align: right;
      font-size: 14px;
      color: #007bff;
      margin-top: -15px;
      margin-bottom: 20px;
    }

    .login-container .forgot-password:hover {
      color: #0056b3;
      text-decoration: underline;
    }

    .error-message {
      color: red;
      text-align: center;
      font-size: 14px;
      margin-bottom: 10px;
    }
  </style>

</head>

<body>

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/chilicare.png" alt="ChiliCare Logo" style="display: block; height: 100px; width: auto; margin-right: 10px;">
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
          

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <div class="page-title light-background">
      <div class="container">
        <h1>Login</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Login</li>
          </ol>
        </nav>
      </div>
    </div>

    <section id="login-section" class="section">
      <div class="container">
        <div class="login-container">
          <h2>Login to ChiliCare</h2>
          
          <!-- Display error message if login failed -->
          <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">Username or password is incorrect.</p>';
            }
          ?>

          <form action="login_process.php" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <a href="register.php" class="forgot-password">Don't have an account? Register here!</a>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="container">
      <p>&copy; ChiliCare. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>

