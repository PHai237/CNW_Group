<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRANG TIN TỨC NEWS 24H</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
    }

    /* Header */
    .header-container {
      background-color: #ffffff;
      border-bottom: 1px solid #eaeaea;
      padding: 20px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .logo img {
      height: 100px;
      object-fit: contain;
    }

    /* Navbar */
    .navbar {
      background-color: #ffffff;
      padding: 10px 30px;
      border-top: 1px solid #eaeaea;
      border-bottom: 1px solid #eaeaea;
    }

    .navbar .navbar-toggler {
      border: none;
      background-color: #f9f9f9;
    }

    .navbar .navbar-toggler:focus {
      box-shadow: none;
    }

    .navbar .navbar-nav {
      display: flex;
      justify-content: space-around;
      width: 100%;
    }

    .navbar .nav-link {
      font-size: 16px;
      font-weight: 500;
      color: #555;
      text-decoration: none;
      margin: 0 15px;
      transition: color 0.3s ease;
      padding: 10px;
      border-radius: 5px;
    }

    .navbar .nav-link:hover {
      background-color: #f1f1f1;
      color: #007bff;
    }

    .navbar .nav-link.active {
      background-color: #007bff;
      color: #fff;
    }

    .navbar .dropdown-menu {
      border-radius: 5px;
      border: 1px solid #eaeaea;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar .dropdown-item {
      font-size: 14px;
      padding: 10px 15px;
      color: #333;
    }

    .navbar .dropdown-item:hover {
      background-color: #007bff;
      color: #fff;
    }

    /* Search Bar */
    .form-control {
      font-size: 14px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      padding: 8px 12px;
      width: 100%;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        align-items: flex-start;
      }

      .navbar .navbar-nav {
        flex-direction: column;
        gap: 10px;
      }
    }
  </style>

</head>

<body>
  <header class="header-container">
    <div class="container d-flex justify-content-between align-items-center">
      <!-- Logo -->
      <div class="logo d-flex align-items-center">
        <div>
          <img src="../public/images/tintuc.jpg" alt="NEWS Logo">
        </div>

        <div class="ms-3">
          <img src="<?= DOMAIN . 'public/images/logo2.webp' ?>" alt="Thế Giới 24 Logo" height="60">
        </div>
      </div>
      <?php if (isset($_SESSION['username'])): ?>
        <a href="?controller=Admin&action=logout" class="nav-link mx-2" style="color:gray">ĐĂNG XUẤT</a>
      <?php else: ?>
        <a href="?controller=Admin&action=showLogin" class="nav-link mx-2" style="color:gray">ĐĂNG NHẬP</a>
      <?php endif; ?>
    </div>
  </header>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="w-100 px-4">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-between w-100">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              THỂ LOẠI
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Đời sống</a></li>
              <li><a class="dropdown-item" href="#">Giáo dục</a></li>
              <li><a class="dropdown-item" href="#">Chính trị</a></li>
              <li><a class="dropdown-item" href="#">Kinh tế</a></li>
            </ul>
          </li>
          <form class="d-flex" role="search" action="?controller=News&action=search" method="POST" style="width: 350px">
            <input class="form-control me-2" type="search" name="text" placeholder="Tìm kiếm" aria-label="Search" style="font-size: 20px; padding: 5px;" required>
            <button class="btn btn-outline-secondary" type="submit" style="font-size: 15px; padding: 5px 10px 5px 8px; width:150px">TÌM KIẾM</button>
          </form>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
