<?php
require "../db/config.php";
require "../models/db.php";
require "../models/product.php";
require "../models/user.php";
require "../models/category.php";

$product = new Product;
$user = new User;
$cate = new Category;


if (isset($_SESSION['user'])) {
  echo $_SESSION['user'];
} else {
  header("location:../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <link rel="stylesheet" href="public/other/all.min.css">
  <link rel="stylesheet" href="public/other/adminlte.min.css">
  <link rel="stylesheet" href="public/other/OverlayScrollbars.min.css">



  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="public/css/all.min.css">

  <link type="text/css" rel="stylesheet" href="public/css/tempusdominus-bootstrap-4.min.css">

  <link type="text/css" rel="stylesheet" href="public/css/icheck-bootstrap.min.css">

  <link type="text/css" rel="stylesheet" href="public/css/jqvmap.min.css">

  <link type="text/css" rel="stylesheet" href="public/css/OverlayScrollbars.min.css">
  <link type="text/css" rel="stylesheet" href="public/css/daterangepicker.css">
  <link type="text/css" rel="stylesheet" href="public/css/summernote-bs4.min.css"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="public/icon/reload.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><strong>=</strong></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"> <img src="public/icon/home.png" alt="" style="width: 30px; height: 30px;">
            Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"> <img src="public/icon/operator.png" alt="" style="width: 30px; height: 30px;">
            Contact</a>
        </li>
        <!-- search -->
        <form method="get" action="#" class="d-flex" role="search">
          <input id="keyword" class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" value="">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <img src="public/icon/fullscreen.png" alt="" style="width: 30px; height: 30px;">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <img src="public/icon/settings.png" alt="" style="width: 30px; height: 30px;">
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->