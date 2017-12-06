<?php include 'session.php'; ?>
<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['simpan']))
    {
        $nama_kecamatan = $_POST['nama_kecamatan'];// user name
        $warna = $_POST['warna'];// user email
        $polygon = $_POST['polygon'];// user email
        
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
        
        if(empty($nama_kecamatan)){
            $errMSG = "Please Enter Username.";
        }
        else if(empty($warna)){
            $errMSG = "Please Enter Your Job Work.";
        }
        else if(empty($imgFile)){
            $errMSG = "Please Select Image File.";
        }
        else
        {
            $upload_dir = 'images/profile/'; // upload directory
    
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
            $stmt = $DB_con->prepare('INSERT INTO keckra(nama_kecamatan,warna,polygon,foto) VALUES(:unama_kecamatan, :uwarna, :upolygon, :ufoto)');
            $stmt->bindParam(':unama_kecamatan',$nama_kecamatan);
            $stmt->bindParam(':uwarna',$warna);
            $stmt->bindParam(':upolygon',$polygon);
            $stmt->bindParam(':ufoto',$userpic);
            
            if($stmt->execute())
            {
                $successMSG = "Data Berhasil Dimasukan";
                header("refresh:3;index.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "Error!!!";
            }
        }
    }
?>
<?php include 'atas.php'; ?>

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
                    <h4 class="header2">Form Input Kecamatan</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="nama_kecamatan" value="<?php echo $nama_kecamatan; ?>" >
                            <label for="first_name">Nama Kecamatan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="warna" type="text" name="warna">
                            <label for="email">Warna</label>
                          </div>
                        </div>
                      	<div class="row">
                          <div class="input-field col s12">
                            <input id="lng" type="text" name="polygon">
                            <label for="first_name">Polygon</label>
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
<?php include 'bawah.php'; ?>