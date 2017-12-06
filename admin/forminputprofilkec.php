<?php include 'session.php'; ?>
<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['simpan']))
    {

        $idkec = $_POST['idkec'];
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        $email = $_POST['email'];// user name
        $alamat = $_POST['alamat'];// user email       
        $desa = $_POST['desa'];// user email
        $penduduk = $_POST['penduduk'];// user email
        $geografis = $_POST['geografis'];// user email
        $industri = $_POST['industri'];// user email
        $pertanian = $_POST['pertanian'];// user email
        $pertambangan = $_POST['pertambangan'];// user email
        $pariwisata = $_POST['pariwisata'];// user email
        $pasar = $_POST['pasar'];// user email
       // echo "<script>alert($idkec)</script>";
        
        
        if(empty($email)){
            $errMSG = "Please Enter Email.";
        }
        else if(empty($alamat)){
            $errMSG = "Please Enter Alamat";
        }
        /*else if(empty($imgFile)){
            $errMSG = "Please Select Image File.";
        }*/
        else
        {
            $upload_dir = 'images/kecamatan/'; // upload directory
    
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
            
            $stmt = $DB_con->prepare('INSERT INTO profilkec (idkec,email,alamat,foto,desa,penduduk,geografis,industri,pertanian,pertambangan,pariwisata,pasar) VALUES(:uidkec,:ufoto,:uemail,:ualamat,:udesa,:upenduduk,:ugeografis,:uindustri,:upertanian, :upertambangan,:upariwisata,:upasar)');
            $stmt->bindParam(':uidkec',$idkec);
            $stmt->bindParam(':ufoto',$userpic);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':ualamat',$alamat);
            $stmt->bindParam(':udesa',$desa);
            $stmt->bindParam(':upenduduk',$penduduk);
            $stmt->bindParam(':ugeografis',$industri);
            $stmt->bindParam(':uindustri',$industri);
            $stmt->bindParam(':upertanian',$pertanian);
            $stmt->bindParam(':upertambangan',$pertambangan);
            $stmt->bindParam(':upariwisata',$pariwisata);
            $stmt->bindParam(':upasar',$pasar);
            

            if($stmt->execute())
            {
                $successMSG = "Data Berhasil Dimasukan";
                header("refresh:3;profile.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
            
        }
    }
?>
<?php include 'atas.php'; ?>
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
                            <select name="idkec">
                            <option value="" disabled selected>Pilih Kecamatan</option>
                           <?php
                            mysql_connect("localhost", "root", "");
                            mysql_select_db("mapskra");
                            $sql = mysql_query("SELECT * FROM keckra ORDER BY idkec DESC");
                            if(mysql_num_rows($sql) != 0){
                                while($row = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$row['idkec'].'">'.$row['nama_kecamatan'].'</option>';
                                }
                            }
                            ?>
                            </select>

                            <label>Kecamatan</label>
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
                            <input id="email" type="text" name="email" value="<?php echo $email; ?>" >
                            <label for="first_name">Email</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="alamat" type="text" name="alamat">
                            <label for="alamat">Alamat</label>
                          </div>
                        </div>                      
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="desa" type="text" name="desa">
                            <label for="first_name">Desa</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="penduduk" type="text" name="penduduk">
                            <label for="first_name">Geografis</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="industri" type="text" name="industri">
                            <label for="first_name">Industri</label>
                          </div>
                        </div>
                         <div class="row">
                          <div class="input-field col s12">
                            <input id="pertanian" type="text" name="pertanian">
                            <label for="first_name">Pertanian</label>
                          </div>
                        </div>
                         <div class="row">
                          <div class="input-field col s12">
                            <input id="pertambangan" type="text" name="pertambangan">
                            <label for="first_name">Partambangan</label>
                          </div>
                        </div>
                         <div class="row">
                          <div class="input-field col s12">
                            <input id="pariwisata" type="text" name="pariwisata">
                            <label for="first_name">Pariwisata</label>
                          </div>
                        </div>
                         <div class="row">
                          <div class="input-field col s12">
                            <input id="pasar" type="text" name="pasar">
                            <label for="first_name">Pasar</label>
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
<?php include 'bawah.php'; ?>
