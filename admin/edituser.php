<?php include 'session.php'; ?>
<?php

	error_reporting(0);
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT username, password, nama, level, foto FROM login WHERE iduser =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: user.php");
	}
	
	if(isset($_POST['update']))
	{
		$username = $_POST['username'];// user name
        $password = $_POST['password'];// user email
        $nama = $_POST['nama'];// user email
        $level = $_POST['level'];// user email
        
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
					
		if($imgFile)
		{
			$upload_dir = 'images/'; // upload directory	
			$imgExt = strtolower(pathnama($imgFile,PATHnama_EXTENSION)); // get image extension
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
			$stmt = $DB_con->prepare('UPDATE login 
									     SET username=:uusername, 
										     password=:upassword, 
										     nama=:unama, 
										     level=:ulevel, 
										     foto=:ufoto 
								       WHERE iduser=:uid');
			$stmt->bindParam(':uusername',$username);
			$stmt->bindParam(':upassword',$password);
			$stmt->bindParam(':unama',$nama);
			$stmt->bindParam(':ulevel',$level);
			$stmt->bindParam(':ufoto',$foto);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='user.php';
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
          <span class="glyphicon glyphicon-nama-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
                <!--start container-->
                <div class="container">
                	<div id="basic-form" class="section">
             
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Form Edit</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="username" value="<?php echo $username; ?>" >
                            <label for="first_name">Username</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="password" type="password" name="password" value="<?php echo $password; ?>">
                            <label for="email">Password</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="password" type="text" name="nama" value="<?php echo $nama; ?>">
                            <label for="email">Nama</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="level" type="text" name="level" value="<?php echo $level; ?>">
                            <label for="first_name">Level</label>
                          </div>
                        </div>
                        <div class="file-field input-field col s12">
                            <input class="file-path validate" type="text" value="<?php echo $foto; ?>" />
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

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- LEFT RIGHT SIDEBAR NAV-->
<?php include 'bawah.php'; ?>