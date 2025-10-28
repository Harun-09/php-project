
<?php session_start();
  require_once("configs/config.php");
  require_once("helpers/helper.php");
  require_once("libraries/library.php");
  require_once("models/model.php");
  require_once("controllers/controller.php");
 
  
//   if(!isset($_SESSION["uid"])) header("location:$base_url");
//   $uid=$_SESSION["uid"];
  

?>


<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Production Management system</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?= $base_url?>/assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url?>/assets/css/animation.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url?>/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url?>/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url?>/assets/css/sidebar.css">

    <!-- <link rel="stylesheet" type="text/css" href="<?= $base_url?>/assets/css/responsive.css"> -->

    <!-- Font -->
    <link rel="stylesheet" href="<?= $base_url?>/assets/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="<?= $base_url?>/assets/icon/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="<?= $base_url?>/assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?= $base_url?>/assets/images/favicon.png">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    
<!-- <script src="<?php echo $base_url?>/asset/plugins/jquery/jquery.min.js"></script> -->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

 <!-- <script src="<?php echo $base_url?>/assets/js/retina-logos.js"></script> -->
<!-- <script src="<?php echo $base_url?>/assets/js/main.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.js" integrity="sha512-dC9VWzoPczd9ppMRE/FJohD2fB7ByZ0VVLVCMlOrM2LHqoFFuVGcWch1riUcwKJuhWx8OhPjhJsAHrp4CP4gtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="body" id="themeBody">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <!-- <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div> -->
                <!-- /preload -->
                <?php
                include_once "main_sidebar.php"
                ?>
                <!-- section-content-right -->
                <div class="section-content-right">
                    <?php
                    include_once "navbar.php";
                    ?>
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">