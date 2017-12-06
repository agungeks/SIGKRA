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


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
    <link href="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../admin/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../admin/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    

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
            <nav style="background: #B6620E;">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="home.php" class="brand-logo darken-1"><img style="width: 75%;height: 56px;" src="../images/iconkra/mapskra.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1>
                    <ul class="right hide-on-med-and-down">
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
                    <li class="user-details">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                   <!--  <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li> -->
                                    <li><a href="logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $data['nama']; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                            </div>
                        </div>
                    </li>
                   <!--  <li class="bold"><a href="home.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li> -->
                    <li class="bold"><a href="kecamatan.php" class="waves-effect waves-cyan"><i class="mdi-action-language"></i>Kecamatan</a>
                    </li>
                    <li class="bold"><a href="profile.php" class="waves-effect waves-cyan"><i class="mdi-action-subject"></i>Profile Kecamatan</a>
                    </li>
                    <li class="bold"><a href="pekerjaan.php" class="waves-effect waves-cyan"><i class="mdi-action-work"></i>Pekerjaan</a>
                    </li>
                    <li class="bold"><a href="kesehatan.php" class="waves-effect waves-cyan"><i class="mdi-action-receipt"></i>Kesehatan</a>
                    </li>
                     <li class="bold"><a href="pendidikan.php" class="waves-effect waves-cyan"><i class="mdi-action-label"></i>Pendidikan</a>
                    </li>
                     <li class="bold"><a href="ekonomi.php" class="waves-effect waves-cyan"><i class="mdi-action-payment"></i>Ekonomi</a>
                    </li>
                     <li class="bold"><a href="insfraktuktur.php" class="waves-effect waves-cyan"><i class="mdi-action-theaters"></i>Insfrakstuktur</a>
                    </li>
                     <li class="bold"><a href="pertanian.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Pertanian</a>
                    </li>
                     <li class="bold"><a href="keamanan.php" class="waves-effect waves-cyan"><i class="mdi-action-lock"></i>Keamanan</a>
                    </li>
                     <li class="bold"><a href="keagamaan.php" class="waves-effect waves-cyan"><i class="mdi-action-class"></i>Keagamaan</a>
                    </li>
                     <li class="bold"><a href="keuangan.php" class="waves-effect waves-cyan"><i class="mdi-action-view-array"></i>Keuangan</a>
                    </li>
                    <li class="bold"><a href="user.php" class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-visibility"></i>User</a>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->