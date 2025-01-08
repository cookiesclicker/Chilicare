<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>ChiliCare - Admin Login</title>
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
    body {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      font-family: 'Roboto', sans-serif;
      color: #ffffff;
    }

    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .login-container img {
      max-width: 100px; /* Adjust the size of the logo */
      margin-bottom: 20px;
    }

    .login-container h2 {
      font-size: 24px;
      margin-bottom: 20px;
      font-weight: 500;
      color: #333;
    }

    .login-container .form-control {
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .login-container .btn-primary {
      background-color: #6a11cb;
      border: none;
      transition: background-color 0.3s;
    }

    .login-container .btn-primary:hover {
      background-color: #2575fc;
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

    footer {
      background: rgba(0, 0, 0, 0.7);
      padding: 20px 0;
      color: #fff;
      text-align: center;
    }
  </style>

</head>

<body>

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <h1 class="sitename"></h1>
      </a>
    </div>
  </header>

  <main class="main">
    <div class="page-title light-background">
      <div class="container">
        <h2>Admin Login</h2>
      </div>
    </div>

    <section id="login-section" class="section">
      <div class="container">
        <div class="login-container">
          <img src="assets/img/chilicare.png" alt="ChiliCare Logo"> <!-- Adjust the logo path -->
          <h2>Login to ChiliCare Admin</h2>
          <form action="admin_login_process.php" method="post">
            <div class="mb-3">
              <label for="admin-username" class="form-label">Username</label>
              <input type="text" class="form-control" id="admin-username" name="admin_username" required>
            </div>
            <div class="mb-3">
              <label for="admin-password" class="form-label">Password</label>
              <input type="password" class="form-control" id="admin-password" name="admin_password" required>
            </div>
            <a href="#" class="forgot-password">Forgot Password?</a>
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



