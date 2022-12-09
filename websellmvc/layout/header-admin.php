<?php  
    $session_login_admin =  isset($_SESSION['login_admin']) ? $_SESSION['login_admin'] : null;
    $cookie_login_admin =  isset($_COOKIE['login_admin']) ? $_COOKIE['login_admin'] : null;
    $id_login_admin = null;
    if($session_login_admin != null || $cookie_login_admin != null){
        $id_login_admin = $session_login_admin == null ? $cookie_login_admin : $session_login_admin ;
        $query_string = "SELECT id,username,email FROM admins WHERE id = $id_login_admin";
        $result_login_admin = db_fetch_row($query_string);
    }else{
      headerLocation('?mod=admin&contrl=admin');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="icon" type="image/png" href="./public/admin/img/favicon.png"> -->
    <title>
        Admin HPRO
    </title>
    <!-- Nucleo Icons -->
    <link href="./public/admin/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./public/admin/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="./public/admin/css/style.css">
    <!-- jquery -->
    <script src="./public/customer/jquery/jquery.min.js"></script>
    <!-- validate -->
    <script src="./public/customer/jquery/jquery.validate.min.js"></script>
    <!-- ckeditor -->
    <script src="./public/admin/ckeditor/ckeditor.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- font awesome6 -->
    <link rel="stylesheet" href="./public/customer/fontawesome6/css/all.min.css">
    <script src="./public/customer/fontawesome6/js/all.min.js"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="./public/admin/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <script type="text/javascript" src="./public/admin/alert/notifIt/js/notifIt.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./public/admin/alert/notifIt/css/notifIt.min.css">

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <span class="text-white">
            <i class="fas fa-tasks"></i>
        </span>
        <span class="ms-1 font-weight-bold text-white">Quản lý HPRO</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white nav-item-header-menu active <?= !empty($data['active_admin']) ? $data['active_admin'] : ''?> " href="?mod=admin">
            <span class="nav-link-text ms-1">Trang chủ</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white nav-item-header-menu active <?= !empty($data['active_category']) ? $data['active_category'] : ''?>" href="?mod=admin&contrl=category">
            <span class="nav-link-text ms-1">Danh mục</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white nav-item-header-menu active <?= !empty($data['active_account']) ? $data['active_account'] : ''?>" href="?mod=admin&contrl=account">
            <span class="nav-link-text ms-1">Tài khoản khách hàng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white nav-item-header-menu active <?= !empty($data['active_order']) ? $data['active_order'] : ''?>" href="?mod=admin&contrl=order">
            <span class="nav-link-text ms-1">Đơn Hàng</span>
          </a>
        </li>
      </ul>

      
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0"><?= $result_login_admin['username']?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="?mod=admin&contrl=admin&ac=logout" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Đăng xuất</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="#" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>