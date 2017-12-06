<?php include 'session.php'; ?>
<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['simpan']))
    {
        $nama = $_POST['namakeuangan'];// user name
        $alamat = $_POST['alamat'];// user email
        $info = $_POST['info'];// user email
        $type = $_POST['type'];// user email
        $sumber = $_POST['sumber'];// user email
        $lng = $_POST['lng'];// user email
        $lat = $_POST['lat'];// user email
        
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
        
        if(empty($nama)){
            $errMSG = "Masukan Nama keuangan";
        }
        else if(empty($alamat)){
            $errMSG = "Masukan Alamat keuangan";
        }
        else if(empty($type)){
            $errMSG = "Masukan Type keuangan";
        }
        else if(empty($imgFile)){
            $errMSG = "Mohon upload foto keuangan";
        }
        else
        {
            $upload_dir = 'images/keuangan/'; // upload directory
    
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
            $stmt = $DB_con->prepare('INSERT INTO keuangan(namakeuangan,alamat,info,type,sumber,lng,lat,foto) VALUES(:unama, :ualamat, :uinfo, :utype, :usumber, :ulng, :ulat, :ufoto)');
            $stmt->bindParam(':unama',$nama);
            $stmt->bindParam(':ualamat',$alamat);
            $stmt->bindParam(':uinfo',$info);
            $stmt->bindParam(':utype',$type);
            $stmt->bindParam(':usumber',$sumber);
            $stmt->bindParam(':ulng',$lng);
            $stmt->bindParam(':ulat',$lat);
            $stmt->bindParam(':ufoto',$userpic);
            
            if($stmt->execute())
            {
                $successMSG = "Data Berhasil Dimasukan";
                header("refresh:3;keuangan.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "Mohon masukan data dengan benar";
            }
        }
    }
?>
<?php include 'atas.php'; ?>

            <!-- START CONTENT -->
            <section id="content">

    
                <!--start container-->
                <div class="container">
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
                <div id="basic-form" class="section">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Form Input Keuangan</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input class="tooltipped data-position="bottom" data-delay="50" data-tooltip="Nama Tempat terkait ex:ATM Bank BNI"" id="name" type="text" name="namakeuangan" value="<?php echo $username; ?>" >
                            <label for="first_name">Nama</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="alamat" type="text" name="alamat">
                            <label for="email">Alamat</label>
                          </div>
                        </div>
                         <div class="row">
                          <div class="input-field col s12">
                            <select type="text" name="type">
                            <option value="" disabled selected>Pilih Tipe</option>
                            <option value="atm">Atm</option>
                            <option value="bank">Bank</option>
                            <!-- <option value="bmt">BMT</option> -->
                            </select>
                            <label>Pilih Tipe</label>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="input-field col s12">
                       		<textarea class="materialize-textarea" length="120" name="info"></textarea>
                        	<label for="message">Info</label>
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
                            <input id="sumber" type="text" name="sumber">
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
<?php include 'bawah.php'; ?>