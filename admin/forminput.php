<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['simpan']))
    {
        $nama = $_POST['namaKesehatan'];// user name
        $alamat = $_POST['alamat'];// user email
        $info = $_POST['info'];// user email
        $lng = $_POST['lng'];// user email
        $lat = $_POST['lat'];// user email
        
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
        
        if(empty($nama)){
            $errMSG = "Please Enter Username.";
        }
        else if(empty($alamat)){
            $errMSG = "Please Enter Your Job Work.";
        }
        else if(empty($imgFile)){
            $errMSG = "Please Select Image File.";
        }
        else
        {
            $upload_dir = 'images/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
        
            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                    $errMSG = "File melebihi batas maksimal";
                }
            }
            else{
                $errMSG = "Maaf, hanya file JPG, JPEG, PNG yang dibolehkan";        
            }
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO kesehatan(namaKesehatan,alamat,info,lng,lat,foto) VALUES(:unama, :ualamat, :uinfo, :ulng, :ulat, :ufoto)');
            $stmt->bindParam(':unama',$nama);
            $stmt->bindParam(':ualamat',$alamat);
            $stmt->bindParam(':uinfo',$info);
            $stmt->bindParam(':ulng',$lng);
            $stmt->bindParam(':ulat',$lat);
            $stmt->bindParam(':ufoto',$userpic);
            
            if($stmt->execute())
            {
                $successMSG = "Data Berhasil Dimasukan";
                header("refresh:3;index.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
        }
    }
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


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
    <link href="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../admin/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../admin/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">


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
                            </li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i>Pendidikan</a>
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

    <?php
    if(isset($errMSG)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
    }
    else if(isset($successMSG)){
        ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
    }
    ?> 
                <!--start container-->
                <div class="container">
                	<div id="basic-form" class="section">
             
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Form Input</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="namaKesehatan" value="<?php echo $username; ?>" >
                            <label for="first_name">Nama</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="alamat" type="text" name="alamat">
                            <label for="email">Alamat</label>
                          </div>
                        </div>
                        <!-- <div class="row">
                          <div class="input-field col s12">
                       		<select>
                            <option value="" disabled selected>Pilih Tipe</option>
                            <option value="1">Manager</option>
                            <option value="2">Developer</option>
                            <option value="3">Business</option>
                            </select>
                        	<label>Pilih Tipe</label>
                      		</div>
                        </div> -->
                        <div class="row">
                        	<div class="input-field col s12">
                       		<textarea id="message5" class="materialize-textarea" length="120" name="info"></textarea>
                        	<label for="message">Deskripsi</label>
                      		</div>
                      	</div>
                      	<div class="row">
                          <div class="input-field col s12">
                            <input id="lng" type="text" name="lng">
                            <label for="first_name">Langitude</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="lat" type="text" name="lat">
                            <label for="first_name">Latitude</label>
                          </div>
                        </div>
                        <div class="file-field input-field col s12">
	                        <input class="file-path validate" type="text" />
	                        <div class="btn">
	                          <span>Foto</span>
	                          <input type="file" accept="image/*" name="foto"/>
	                        </div>
	                      </div>
	                    <div class="row">
                          <div class="input-field col s12">
                            <input id="sumber" type="text">
                            <label for="first_name">Sumber</label>
                          </div>
                        </div>
	                    <div class="row">
	                      <div class="input-field col s12">
	                      <button class="btn cyan waves-effect waves-light right" type="submit" name="simpan">Submit
	                      <i class="mdi-content-send right"></i>
	                      </button>
	                      </div>
	                    </div>
                      </form>
                    </div>
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
    <script type="text/javascript" src="../admin/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
       

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../admin/js/plugins.js"></script>
</body>

</html>