<?php
// memanggil file config.php
require 'config.php';
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
    <title>Home</title>

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
    <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../admin/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">    
    <link href="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../admin/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../admin/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../admin/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                        <li>    
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search"><i class="mdi-action-search"></i></a>                              
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="index.html" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i>Kesehatan</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="css-typography.html">input data</a>
                                        </li>                                        
                                        <li><a href="css-icons.html">lihat data</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i>Pendidikan</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="css-typography.html">input data</a>
                                        </li>                                        
                                        <li><a href="css-icons.html">lihat data</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i>Ekonomi</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="css-typography.html">input data</a>
                                        </li>                                        
                                        <li><a href="css-icons.html">lihat data</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
                    <?php 
                        if(isset($_GET['pesan'])){
                            $pesan = $_GET['pesan'];
                            if($pesan == "input"){
                                echo "Data berhasil di input.";
                            }else if($pesan == "update"){
                                echo "Data berhasil di update.";
                            }else if($pesan == "hapus"){
                                echo "Data berhasil di hapus.";
                            }
                        }
                    ?>
    <br/>
     <a class="btn-floating btn-large waves-effect waves-light " href="tambahkelurahan.php"><i class="mdi-content-add"></i></a>
<!--                           <a class="btn-floating waves-effect waves-light "><i class="mdi-content-clear"></i></a>
                          <p>Tambah</p>
 -->   <!--  <a class="waves-effect waves-light  btn" >+ Tambah Data Baru</a> -->
    <div id="table-datatables">
      <table id="data-table-simple" class="responsive-table display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nama Desa</th>
                <th>Alamat Desa</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Aksi</th>
            </tr>
        </thead>
                
        <tbody>
        <?php
        $sql = "SELECT * FROM kelurahan";
        $query = mysql_query($sql);
        while($row = mysql_fetch_assoc($query)):?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['adress'];?></td>
                <td><?php echo $row['lng'];?></td>
                <td><?php echo $row['lat'];?></td>
                <td>
                    <!-- <a onclick="return confirm('Anda Yakin Di Hapus Data Ini'); " href="hapus.php"><?php $row['id']; ?>Hapus</a> -->

                  <!--   <a class="waves-effect waves-light  btn" href="editkelurahan.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a class="waves-effect waves-light  btn" href="hapuskelurahan.php?id=<?php echo $row['id']; ?>">Hapus</a> -->
                    <a class="btn-floating waves-effect waves-light " href="editkelurahan.php?edit_id=<?php echo $row['id']; ?>">
                    <i class="mdi-content-content-cut"></i></a>
                    <a class="btn-floating btn-flat waves-effect waves-light pink accent-2 white-text" href="hapuskelurahan.php?edit_id=<?php echo $row['id']; ?>">
                    <i class="mdi-content-clear"></i></a>
                </td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
    </div>

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2016 <a class="grey-text text-lighten-4" href="http://karanganyarkab.go.id" target="_blank">Kabupaten Karanganyar</a> All rights reserved.
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->


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
    <!-- data-tables -->
    <script type="text/javascript" src="../admin/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../admin/js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="../admin/js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../admin/js/plugins.js"></script>    
</body>

</html>