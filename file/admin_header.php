<?php
include '../forms/adminQueries.php';
include "checker.php";
echo '
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Category-Courses</title>
<!-- plugins:css -->
<link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="../vendors/chartist/chartist.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="../assets/css/style-admin.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="../assets/img/ucc.png" />
<!-- SweetAlert JS -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="navbar-brand-wrapper d-flex align-items-center">
<a class="navbar-brand brand-logo" href="../views/admin.php">
<img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" class="logo-dark" />
</a>
<a class="navbar-brand brand-logo-mini" href="../views/admin.php"><img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" /></a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
<h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Admin!</h5>
<ul class="navbar-nav navbar-nav-right ml-auto">
<li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
<span class="font-weight-normal"> Admin </span></a>
<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
<div class="dropdown-header text-center">
<p class="mb-1 mt-3">Administrator</p>
<p class="font-weight-light text-muted mb-0">user@gmail.com</p>
</div>
<a class="dropdown-item" href="admin.php?off=true"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
';

function log_off() {
$_SESSION['valid'] = false;
unset($_SESSION['user']);
unset($_SESSION['type']);
unset($_SESSION['name']);
echo "<script> window.location = './loginform.php' </script>";
}

if (isset($_GET['off'])) {
log_off();
}

echo '
</div>
</li>
</ul>
<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
<span class="icon-menu"></span>
</button>
</div>
</nav>';


include("../forms/database.php");
include("../forms/alert.php");

if ($_GET) {
$val = $_GET['status'];
alert($val);
}
echo '
<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item nav-profile">
<a href="#" class="nav-link">
<div class="text-wrapper">
<p class="profile-name">Admin</p>
<p class="designation">Administrator</p>
</div>
<div class="icon-container">
<i class="icon-user"></i>
<div class="dot-indicator bg-success"></div>
</div>
</a>
</li>
<li class="nav-item nav-category">
<span class="nav-link">Admin Dashboard</span>
</li>
<li class="nav-item">
<a class="nav-link" href="../views/admin.php">
<span class="menu-title">Dashboard</span>
<i class="icon-screen-desktop menu-icon"></i>
</a>
</li>
<li class="nav-item nav-category"><span class="nav-link">Exam Categories</span></li>
<li class="nav-item">
<a class="nav-link" href="../views/admin-courses.php">
<span class="menu-title">Courses</span>
<i class="icon-globe menu-icon"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../views/admin-hobbies.php">
<span class="menu-title">Hobbies</span>
<i class="icon-book-open menu-icon"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
<span class="menu-title">Subjects</span>
<i class="icon-chart menu-icon"></i>
</a>
<div class="collapse" id="ui-basic">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="../views/subject-english.php">English</a></li>
<li class="nav-item"> <a class="nav-link" href="../views/subject-math.php">Math</a></li>
<li class="nav-item"> <a class="nav-link" href="../views/subject-fil.php">Filipino</a></li>
<li class="nav-item"> <a class="nav-link" href="../views/subject-science.php">Science</a></li>
<li class="nav-item"> <a class="nav-link" href="../views/subject-logic.php">Logic</a></li>
</ul>
</div>
</li>
<li class="nav-item nav-category"><span class="nav-link">History</span></li>
<li class="nav-item">
<a class="nav-link" href="../views/admin-results.php">
<span class="menu-title">Results</span>
<i class="icon-chart menu-icon"></i>
</a>
</li>
</ul>
</nav>';?>