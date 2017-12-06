<?php include 'session.php'; ?>
<?php

	error_reporting(0);
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT namakeuangan, alamat, info, lng, type, sumber, lat, foto FROM keuangan WHERE idkeuangan =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: keuangan.php");
	}
	
	
	
	if(isset($_POST['update']))
	{
		$namakeuangan = $_POST['namakeuangan'];// user name
        $alamat = $_POST['alamat'];// user email
        $type = $_POST['type'];// user email
        $info = $_POST['info'];// user email
        $lng = $_POST['lng'];// user email
        $lat = $_POST['lat'];// user email
        $sumber = $_POST['sumber'];// user email
        
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
					
		if($imgFile)
		{
			$upload_dir = 'images/keuangan/'; // upload directory	
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
			$stmt = $DB_con->prepare('UPDATE keuangan 
									     SET namakeuangan=:unama, 
										     alamat=:ualamat, 
                                             info=:uinfo,  
										     type=:utype,  
										     lng=:ulng, 
                                             lat=:ulat, 
										     sumber=:usumber, 
										     foto=:ufoto 
								       WHERE idkeuangan=:uid');
			$stmt->bindParam(':unama',$namakeuangan);
			$stmt->bindParam(':ualamat',$alamat);
            $stmt->bindParam(':uinfo',$info);
			$stmt->bindParam(':utype',$type);
			$stmt->bindParam(':ulng',$lng);
            $stmt->bindParam(':ulat',$lat);
			$stmt->bindParam(':usumber',$sumber);
			$stmt->bindParam(':ufoto',$foto);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='keuangan.php';
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
                    <h4 class="header2">Form Edit keuangan</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="nama" type="text" name="namakeuangan" value="<?php echo $namakeuangan;?>">
                            <label>Nama keuangan</label>
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
                            <select name ="type" type="text">
                            <option value="<?php echo $type;?>" disabled selected><?php echo $type;?></option>
                            <option value="atm">ATM</option>
                            <option value="bank">Bank</option>
                            </select>
                            <label>Pilih Tipe</label>
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="input-field col s12">
                            <input id="lng" type="text" name="info" value="<?php echo $info;?>">
                            <label for="first_name">Info</label>
                         	</div>
                      	</div>
                      	<div class="row">
                          <div class="input-field col s12">
                            <input id="lng" type="text" name="lng" value="<?php echo $lng;?>">
                            <label for="first_name">Longitude</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="lat" type="text" name="lat" value="<?php echo $lat;?>">
                            <label for="first_name">Latitude</label>
                          </div>
                        </div>

                        <div class="file-field input-field col s12">
                        	<input class="file-path validate" type="text" value="<?php echo $row['foto']; ?>" />
	                        <img src="images/keuangan/<?php echo $foto; ?>" width="90px" height="90px" />
	                        <div class="btn">
	                          <span>Foto</span>
	                          <input type="file" accept="image/*" name="foto"/>
	                        </div>
	                    </div>
	                    <div class="row">
                          <div class="input-field col s12">
                            <input id="lat" type="text" name="sumber" value="<?php echo $sumber;?>">
                            <label for="first_name">Sumber</label>
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