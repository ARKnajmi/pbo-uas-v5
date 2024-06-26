<?php
    include_once '../lib/Session.php';
    Session::checkSession();
    $filepath = realpath(dirname(__FILE__));


    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache"); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
    header("Cache-Control: max-age=2592000");
?>
<?php
    include_once '../classes/Brand.php';
    $brand = new Brand();
    include_once '../classes/Category.php';
    $cat = new Category();
    error_reporting(E_ALL ^ E_NOTICE);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['brandName'])) {
          $brandName = $_POST['brandName'];
          $insertBrand = $brand->brandInsert($brandName);
      }
  
      if (isset($_POST['catName'])) {
          $catName = $_POST['catName'];
          $insertCat = $cat->catInsert($catName);
      }
  }
   
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">
   <?php  if (isset($insertBrand) && isset($brandName)) {   ?>
               
               <div class="alert alert-success ">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Success!</strong> Brand Added Succesfully.
               </div>
          
   <?php }?>
   <?php  if (isset($insertCat) && isset($catName)) {   ?>
               
               <div class="alert alert-success ">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Success!</strong> Category Added Succesfully.
               </div>
          
   <?php }?>
   
    
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Admin </a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

    

      <!-- Navbar -->
      <?php 
            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                Session::destroy();
            }
         ?>  
      <ul class="navbar-nav ml-auto ml-md-12 pull-right">
       
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

       

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Add/Remove Category:</h6>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#catModal">Add Category</a>
            <a class="dropdown-item" href="categories.php">Category List</a>
            
        </li>


        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Brand</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Add/Remove Brand:</h6>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#brandModal">Add Brand</a>
            <a class="dropdown-item" href="brands.php">Brand List</a>
            
        </li> -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Add/Remove Products:</h6>
            <a class="dropdown-item" href="addproduct.php">Add Products</a>
            <a class="dropdown-item" href="products.php">Products List</a>
            
        </li>
       
      
        
        <li class="nav-item">
          <a class="nav-link" href="orders.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span></a>
        </li>
      </ul>
