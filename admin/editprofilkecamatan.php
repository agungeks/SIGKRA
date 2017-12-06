<?php include 'session.php'; ?>
<?php

	error_reporting(0);
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT idkec,foto,email, alamat,desa,penduduk,geografis,industri,pertanian,pertambangan,pariwisata,pasar FROM profilkec WHERE idprofil =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: profile.php");
	}
	
	if(isset($_POST['update']))
	{
        $idkec = $_POST['idkec'];// user name
        $foto = $_POST['foto'];// user name
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
       
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
					
		if($imgFile)
		{
			$upload_dir = 'images/kecamatan/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png',); // valid extensions
			$foto = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['foto']);
					move_uploaded_file($tmp_dir,$upload_dir.$foto);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$foto = $edit_row['foto']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE profilkec 
									     SET idkec=:unama,
                                             email=:uemail, 
                                             alamat=:ualamat, 
                                             desa=:udesa, 
                                             penduduk=:upenduduk, 
                                             geografis=:ugeografis, 
                                             industri=:uindustri, 
                                             pertanian=:upertanian, 
                                             pertambangan=:upertambangan, 
                                             pariwisata=:upariwisata, 
										     pasar=:upasar, 
										     foto=:ufoto 
								       WHERE idprofil=:uid');

            $stmt->bindParam(':unama',$idkec);
			$stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':ualamat',$alamat);
            $stmt->bindParam(':udesa',$desa);
			$stmt->bindParam(':upenduduk',$penduduk);
			$stmt->bindParam(':ugeografis',$geografis);
			$stmt->bindParam(':uindustri',$industri);
            $stmt->bindParam(':upertanian',$pertanian);
            $stmt->bindParam(':upertambangan',$pertambangan);
            $stmt->bindParam(':upariwisata',$pariwisata);
			$stmt->bindParam(':upasar',$pasar);
			$stmt->bindParam(':ufoto',$foto);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='profile.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
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
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
                <!--start container-->
                <div class="container">
                	<div id="basic-form" class="section">
             
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Form Edit Profile Kecamatan</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12 disable">
                            <input id="nama" type="text" name="idkec" value="<?php echo $idkec;?>">
                            <label>Kecamatan</label>
                          </div>
                        </div>
                        <div class="file-field input-field col s12">
                            <input class="file-path validate" type="text" value="<?php echo $row['foto']; ?>" />
                            <img src="images/kecamatan/<?php echo $foto; ?>" width="90px" height="90px" />
                            <div class="btn">
                              <span>Foto</span>
                              <input type="file" accept="image/*" name="foto"/>
                              
                            </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="email" type="text" name="email" value="<?php echo $email;?>">
                            <label>Email</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="alamat" type="text" name="alamat" value="<?php echo $alamat;?>">
                            <label>Alamat</label>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="desa" type="text" name="desa" value="<?php echo $desa;?>">
                            <label>Desa</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="penduduk" type="text" name="penduduk" value="<?php echo $penduduk;?>">
                            <label>Penduduk</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input id="geografis" type="text" name="geografis" value="<?php echo $geografis;?>">
                            <label>Geografis</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input id="industri" type="text" name="industri" value="<?php echo $industri;?>">
                            <label>Industri</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input id="pertanian" type="text" name="pertanian" value="<?php echo $pertanian;?>">
                            <label>Pertanian</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input id="pertambangan" type="text" name="pertambangan" value="<?php echo $pertambangan;?>">
                            <label>Pertambangan</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input id="pariwisata" type="text" name="pariwisata" value="<?php echo $pariwisata;?>">
                            <label>Pariwisata</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input id="pasar" type="text" name="pasar" value="<?php echo $pasar;?>">
                            <label>Pasar</label>
                          </div>
                        </div>
                      		                    
	                    <div class="row">
	                      <div class="input-field col s12">
	                      <button class="btn cyan waves-effect waves-light right" type="submit" name="update">Submit
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