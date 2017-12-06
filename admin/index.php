<?php  
@session_start(); // memulai session
include "dbconfig2.php"; // memanggil koneksi

if (@$_SESSION['admin'] || @$_SESSION['operator']) { //apabila session admin ataupun operator sudah ada maka
 // langsung menuju kehalaman index.php
    header("location: home.php");
    //jika tidak ada
} else {
 // menuju ke halaman login di bawah ini
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login | MAPS</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="../admin/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../admin/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../admin/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="../admin/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body>

  

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="proses.php" method="post">
        <div class="row">
          <div class="input-field col s12 center">
            Login | SIGKRA
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="user">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="pass">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
         <!--  <div class="input-field col s12">
            <input class="btn waves-effect waves-light col s12" />
          </div> -->
          <div >
            <input class="input-field btn waves-effect waves-light col s12" type="submit" value="Login" name="login" >
          </div>
        </div>
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="../admin/js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="../admin/js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="../admin/js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="../admin/js/plugins.js"></script>

</body>

</html>
<?php 
} 
?>