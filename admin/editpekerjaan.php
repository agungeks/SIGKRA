<?php include 'session.php'; ?>
<?php

	error_reporting(0);
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT idkec,belumbekerja,irt,pelajarmhs,pensiun,pns,tni,polisi,perdagangan,petani,peternak,insdustri,konstruksi,transportasi,karyawanswasta,bumnbumd,bhl,perkebunan,dosen,guru,dokter,pedagang,perangkatdesa,wiraswasta,tahun,satuan FROM pekerjaan WHERE idpekerjaan =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: pekerjaan.php");
	}
	
	if(isset($_POST['update']))
	{
        $idkec        = $_POST['idkec'];// user name
        $belumbekerja = $_POST['belumbekerja'];
        $irt          = $_POST['irt'];
        $pelajarmhs   = $_POST['pelajarmhs'];
        $pensiun      = $_POST['pensiun'];
        $pns          = $_POST['pns'];
        $tni          = $_POST['tni'];
        $polisi       = $_POST['polisi'];
        $perdagangan  = $_POST['perdagangan'];
        $petani       = $_POST['petani'];
        $peternak     = $_POST['peternak'];
        $insdustri    = $_POST['insdustri'];
        $konstruksi   = $_POST['konstruksi'];
        $transportasi = $_POST['transportasi'];
        $karyawanswasta = $_POST['karyawanswasta'];
        $bumnbumd     = $_POST['bumnbumd'];
        $bhl          = $_POST['bhl'];
        $perkebunan   = $_POST['perkebunan'];
        $dosen        = $_POST['dosen'];
        $guru         = $_POST['guru'];
        $dokter       = $_POST['dokter'];
        $pedagang     = $_POST['pedagang'];
        $perangkatdesa= $_POST['perangkatdesa'];
        $wiraswasta   = $_POST['wiraswasta'];
        $tahun        = $_POST['tahun'];
        $satuan       = $_POST['satuan'];
       
    /*    $imgFile = $_FILES['foto']['name'];
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
		*/				
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE pekerjaan 
									     SET idkec=:uidkec,
                           belumbekerja=:ubelumbekerja, 
                           irt=:uirt, 
                           pelajarmhs=:upelajarmhs, 
                           pensiun=:upensiun, 
                           pns=:upns, 
                           tni=:utni, 
                           polisi=:upolisi, 
                           perdagangan=:uperdagangan, 
                           petani=:upetani, 
                           peternak=:upeternak, 
                           insdustri=:uinsdustri, 
                           konstruksi=:ukonstruksi, 
                           transportasi=:utransportasi, 
                           karyawanswasta=:ukaryawanswasta, 
                           bumnbumd=:ubumnbumd, 
                           bhl=:ubhl, 
                           perkebunan=:uperkebunan, 
                           dosen=:udosen, 
                           guru=:uguru, 
                           dokter=:udokter, 
                           pedagang=:upedagang, 
                           perangkatdesa=:uperangkatdesa, 
                           wiraswasta=:uwiraswasta, 
                           tahun=:utahun, 
										       satuan=:usatuan 
                           WHERE idpekerjaan=:uid');

            $stmt->bindParam(':uidkec',$idkec);
            $stmt->bindParam(':ubelumbekerja',$belumbekerja);
            $stmt->bindParam(':uirt',$irt);
            $stmt->bindParam(':upelajarmhs',$pelajarmhs);
            $stmt->bindParam(':upensiun',$pensiun);
            $stmt->bindParam(':upns',$pns);
            $stmt->bindParam(':utni',$tni);
            $stmt->bindParam(':upolisi',$polisi);
            $stmt->bindParam(':uperdagangan',$perdagangan);
            $stmt->bindParam(':upetani',$petani);
            $stmt->bindParam(':upeternak',$peternak);
            $stmt->bindParam(':uinsdustri',$insdustri);
            $stmt->bindParam(':ukonstruksi',$konstruksi);
            $stmt->bindParam(':utransportasi',$transportasi);
            $stmt->bindParam(':ukaryawanswasta',$karyawanswasta);
            $stmt->bindParam(':ubumnbumd',$bumnbumd);
            $stmt->bindParam(':ubhl',$bhl);
            $stmt->bindParam(':uperkebunan',$perkebunan);
            $stmt->bindParam(':udosen',$dosen);
            $stmt->bindParam(':uguru',$guru);
            $stmt->bindParam(':udokter',$dokter);
            $stmt->bindParam(':upedagang',$pedagang);
            $stmt->bindParam(':uperangkatdesa',$perangkatdesa);
            $stmt->bindParam(':uwiraswasta',$wiraswasta);
            $stmt->bindParam(':utahun',$tahun);
            $stmt->bindParam(':usatuan',$satuan);
            $stmt->bindParam(':uid',$id);
          
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='pekerjaan.php';
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
                    <h4 class="header2">Form Edit Pekerjaan</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                      <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="idkec" value="<?php echo $idkec; ?>" >
                            <label for="first_name">Nama Kecamatan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="belumbekerja" value="<?php echo $belumbekerja; ?>" >
                            <label for="first_name">Belum Bekerja</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="irt" value="<?php echo $irt; ?>" >
                            <label for="first_name">Mengurus Rumah Tangga</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="pelajarmhs" value="<?php echo $pelajarmhs; ?>" >
                            <label for="first_name">Pelajar/Mahasiswa</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="pensiun" value="<?php echo $pensiun; ?>" >
                            <label for="first_name">Pensiun</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="pns" value="<?php echo $pns; ?>" >
                            <label for="first_name">PNS</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="tni" value="<?php echo $tni; ?>" >
                            <label for="first_name">TNI</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="polisi" value="<?php echo $polisi; ?>" >
                            <label for="first_name">Polisi</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="perdagangan" value="<?php echo $perdagangan; ?>" >
                            <label for="first_name">Perdagangan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="petani" value="<?php echo $petani; ?>" >
                            <label for="first_name">Petani</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="peternak" value="<?php echo $peternak; ?>" >
                            <label for="first_name">Peternak</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="insdustri" value="<?php echo $insdustri; ?>" >
                            <label for="first_name">Industri</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="konstruksi" value="<?php echo $konstruksi; ?>" >
                            <label for="first_name">Konstruksi</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="transportasi" value="<?php echo $transportasi; ?>" >
                            <label for="first_name">Transportasi</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="karyawanswasta" value="<?php echo $karyawanswasta; ?>" >
                            <label for="first_name">Karyawan Swasta</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="bumnbumd" value="<?php echo $bumnbumd; ?>" >
                            <label for="first_name">BUMD/BUMN</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="bhl" value="<?php echo $bhl; ?>" >
                            <label for="first_name">Buruh Harian Lepas</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="perkebunan" value="<?php echo $perkebunan; ?>" >
                            <label for="first_name">Perkebunan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="dosen" value="<?php echo $dosen; ?>" >
                            <label for="first_name">Dosen</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="guru" value="<?php echo $guru; ?>" >
                            <label for="first_name">Guru</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="dokter" value="<?php echo $dokter; ?>" >
                            <label for="first_name">Dokter</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="pedagang" value="<?php echo $pedagang; ?>" >
                            <label for="first_name">Pedagang</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="perangkatdesa" value="<?php echo $perangkatdesa; ?>" >
                            <label for="first_name">Perangkat Desa</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="wiraswasta" value="<?php echo $wiraswasta; ?>" >
                            <label for="first_name">Wiraswasta</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="tahun" value="<?php echo $tahun; ?>" >
                            <label for="first_name">Tahun</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="satuan" value="<?php echo $satuan; ?>" >
                            <label for="first_name">Satuan</label>
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