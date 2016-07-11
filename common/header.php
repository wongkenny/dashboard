<?php 
include_once 'config/functions.php'; 
session_start();
if(!isset($_SESSION['id'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GoFar | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.tableTools.css">
    <script type="text/javascript" language="javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/dataTables.tableTools.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


      <header class="main-header">

   
        <a href="index2.html" class="logo">

          <span class="logo-mini"></span>

          <span class="logo-lg"><img src='assets/images/logo.png'></span>
        </a>


        <nav class="navbar navbar-static-top" role="navigation">

     
         
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            
              

          
            
              <li class="dropdown user user-menu">
              
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                  <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              
                  <span class="hidden-xs"><?php echo fetch_user_full_name($_SESSION['id']);?></span>
                </a>
                <ul class="dropdown-menu">
                 
                  <li class="user-header">
                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo fetch_user_full_name($_SESSION['id']);?>
                      <small>Member since <?php echo fetch_user_registered_date($_SESSION['id']);?></small>
                    </p>
                  </li>
             
                  
                
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="index.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            
              
            </ul>
          </div>
        </nav>
      </header>