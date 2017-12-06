<?php include 'session.php'; ?>
<?php

	error_reporting(0);
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT adress, name, lng, lat, type FROM kelurahan WHERE id=:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: home.php");
	}
	
	
	
	if(isset($_POST['update']))
	{
		$adress = $_POST['adress'];// user name
        $name = $_POST['name'];// user email
        $type = $_POST['type'];// user email
        $lng = $_POST['lng'];// user email
        $lat = $_POST['lat'];// user email
        
       /* $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        */
					
		/*if($imgFile)
		{
			$upload_dir = 'images/'; // upload directory	
			$imgExt = strtolower(pathtype($imgFile,PATHtype_EXTENSION)); // get image extension
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
						*/
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE kelurahan 
									     SET adress=:uadress, 
										     name=:uname, 
										     type=:utype, 
										     lng=:ulng, 
										     lat=:ulat
								       WHERE id=:uid');
			$stmt->bindParam(':uadress',$adress);
			$stmt->bindParam(':uname',$name);
			$stmt->bindParam(':utype',$type);
			$stmt->bindParam(':ulng',$lng);
			$stmt->bindParam(':ulat',$lat);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='kelurahan.php';
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
          <span class="glyphicon glyphicon-type-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
                <!--start container-->
                <div class="container">
                	<div id="basic-form" class="section">
             
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Form Edit Kelurahan</h4>
                    <div class="row">
                      <form class="col s12" method="post" >
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="alamat" type="text" name="adress" value="<?php echo $adress;?>">
                            <label>Alamat</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="name" value="<?php echo $name;?>">
                            <label>Nama Kelurahan</label>
                          </div>
                        </div>
                        <div class="row">
                        	<div class="input-field col s12">
                            <input id="lng" type="text" name="type" value="<?php echo $type;?>">
                            <label for="first_name">Tipe</label>
                         	</div>
                      	</div>
                      	<div class="row">
                          <div class="input-field col s12">
                            <input id="lng" type="text" name="lng" value="<?php echo $lng;?>">
                            <label for="first_name">Langitude</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="lat" type="text" name="lat" value="<?php echo $lat;?>">
                            <label for="first_name">Latitude</label>
                          </div>
                        </div>
                        	                    
	                    <div class="row">
	                      <div class="input-field col s12">
	                      <button class="btn cyan waves-effect waves-light right" type="submit" name"update">Submit
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