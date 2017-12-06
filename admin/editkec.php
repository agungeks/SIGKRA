<?php include 'session.php'; ?>
<?php

	error_reporting(0);
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT warna, nama_kecamatan, polygon,foto FROM keckra WHERE idkec =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: kecamatan.php");
	}
	
	
	
	if(isset($_POST['update']))
	{
		$warna = $_POST['warna'];// user email
        $nama_kecamatan = $_POST['nama_kecamatan'];// user email
        $polygon = $_POST['polygon'];// user email
        
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
					
		if($imgFile)
		{
			$upload_dir = 'images/'; // upload directory	
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
			$stmt = $DB_con->prepare('UPDATE keckra 
									     SET warna=:uwarna, 
                                             nama_kecamatan=:unama_kecamatan,  
										     polygon=:upolygon, 
                                             foto=:ufoto 
								       WHERE idkec=:uid');
			$stmt->bindParam(':uwarna',$warna);
            $stmt->bindParam(':unama_kecamatan',$nama_kecamatan);
			$stmt->bindParam(':upolygon',$polygon);
            $stmt->bindParam(':ufoto',$foto);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='kecamatan.php';
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
          <span class="glyphicon glyphicon-nama_kecamatan-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
                <!--start container-->
                <div class="container">
                	<div id="basic-form" class="section">
             
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Form Edit Kecamatan</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="nama" type="text" name="nama_kecamatan" value="<?php echo $nama_kecamatan;?>">
                            <label>Nama Kecamatan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="warna" type="text" name="warna" value="<?php echo $warna;?>">
                            <label>Warna</label>
                          </div>
                        </div>
                        
                      	<div class="row">
                          <div class="input-field col s12">
                            <input id="polygon" type="text" name="polygon" value="<?php echo $polygon;?>">
                            <label for="first_name">Polygon</label>
                          </div>
                        </div>
                        <div class="file-field input-field col s12">
                        	<input class="file-path validate" type="text" value="<?php echo $row['foto']; ?>" />
	                        <img src="images/<?php echo $foto; ?>" width="90px" height="90px" />
	                        <div class="btn">
	                          <span>Foto</span>
	                          <input type="file" accept="image/*" name="foto"/>
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

<?php include 'bawah.php'; ?>