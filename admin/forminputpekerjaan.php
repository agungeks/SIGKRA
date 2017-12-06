<?php include 'session.php'; ?>
<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['simpan']))
    {
        $idkec = $_POST['idkec'];// user name
        $belumbekerja = $_POST['belumbekerja'];
        $irt = $_POST['irt'];
        $pelajarmhs = $_POST['pelajarmhs'];
        $pensiun = $_POST['pensiun'];
        $pns = $_POST['pns'];
        $tni = $_POST['tni'];
        $polisi = $_POST['polisi'];
        $perdagangan = $_POST['perdagangan'];
        $petani = $_POST['petani'];
        $peternak = $_POST['peternak'];
        $insdustri = $_POST['insdustri'];
        $konstruksi = $_POST['konstruksi'];
        $transportasi = $_POST['transportasi'];
        $karyawanswasta = $_POST['karyawanswasta'];
        $bumnbumd = $_POST['bumnbumd'];
        $bhl = $_POST['bhl'];
        $perkebunan = $_POST['perkebunan'];
        $dosen = $_POST['dosen'];
        $guru = $_POST['guru'];
        $dokter = $_POST['dokter'];
        $pedagang = $_POST['pedagang'];
        $perangkatdesa = $_POST['perangkatdesa'];
        $wiraswasta = $_POST['wiraswasta'];
        $tahun = $_POST['tahun'];
        $satuan = $_POST['satuan'];
        
        /*
        $imgFile = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];
        
        
        if(empty($idkec)){
            $errMSG = "Mohon Masukan Kecamatan";
        }
        else
        {
            $upload_dir = 'images/kecamatan'; // upload directory
    
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
        }*/
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO pekerjaan(idkec,belumbekerja,irt,pelajarmhs,pensiun,pns,tni,polisi,perdagangan,petani,peternak,insdustri,konstruksi,transportasi,karyawanswasta,bumnbumd,bhl,perkebunan,dosen,guru,dokter,pedagang,perangkatdesa,wiraswasta,tahun,satuan) VALUES (:uidkec,:ubelumbekerja,:uirt,:upelajarmhs,:upensiun,:upns,:utni,:upolisi,:uperdagangan,:upetani,:upeternak,:uinsdustri,:ukonstruksi,:utransportasi,:ukaryawanswasta,:ubumnbumd,:ubhl,:uperkebunan,:udosen,:uguru,:udokter,:upedagang,:uperangkatdesa,:uwiraswasta,:utahun,:usatuan)');
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
        /*    $stmt->bindParam(':ufoto',$userpic);
        */    
            if($stmt->execute())
            {
                $successMSG = "Data Berhasil Dimasukan";
                header("refresh:3;pekerjaan.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
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
                    <h4 class="header2">Form Input Pekerjaan</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="idkec" value="<?php echo $idkec; ?>" >
                            <label for="first_name">Nama Kecamatan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="belumbekerja" value="<?php echo $belumbekerja; ?>" >
                            <label for="first_name">Belum Bekerja</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="irt" value="<?php echo $irt; ?>" >
                            <label for="first_name">Mengurus Rumah Tangga</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="pelajarmhs" value="<?php echo $pelajarmhs; ?>" >
                            <label for="first_name">Pelajar/Mahasiswa</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="pensiun" value="<?php echo $pensiun; ?>" >
                            <label for="first_name">Pensiun</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="pns" value="<?php echo $pns; ?>" >
                            <label for="first_name">PNS</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="tni" value="<?php echo $tni; ?>" >
                            <label for="first_name">TNI</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="polisi" value="<?php echo $polisi; ?>" >
                            <label for="first_name">Polisi</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="perdagangan" value="<?php echo $perdagangan; ?>" >
                            <label for="first_name">Perdagangan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="petani" value="<?php echo $petani; ?>" >
                            <label for="first_name">Petani</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="peternak" value="<?php echo $peternak; ?>" >
                            <label for="first_name">Peternak</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="insdustri" value="<?php echo $insdustri; ?>" >
                            <label for="first_name">Industri</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="konstruksi" value="<?php echo $konstruksi; ?>" >
                            <label for="first_name">Konstruksi</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="transportasi" value="<?php echo $transportasi; ?>" >
                            <label for="first_name">Transportasi</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="karyawanswasta" value="<?php echo $karyawanswasta; ?>" >
                            <label for="first_name">Karyawan Swasta</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="bumnbumd" value="<?php echo $bumnbumd; ?>" >
                            <label for="first_name">BUMD/BUMN</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="bhl" value="<?php echo $bhl; ?>" >
                            <label for="first_name">Buruh Harian Lepas</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="perkebunan" value="<?php echo $perkebunan; ?>" >
                            <label for="first_name">Perkebunan</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="dosen" value="<?php echo $dosen; ?>" >
                            <label for="first_name">Dosen</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="guru" value="<?php echo $guru; ?>" >
                            <label for="first_name">Guru</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="dokter" value="<?php echo $dokter; ?>" >
                            <label for="first_name">Dokter</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="pedagang" value="<?php echo $pedagang; ?>" >
                            <label for="first_name">Pedagang</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="perangkatdesa" value="<?php echo $perangkatdesa; ?>" >
                            <label for="first_name">Perangkat Desa</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="wiraswasta" value="<?php echo $wiraswasta; ?>" >
                            <label for="first_name">Wiraswasta</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="tahun" value="<?php echo $tahun; ?>" >
                            <label for="first_name">Tahun</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="satuan" value="<?php echo $satuan; ?>" >
                            <label for="first_name">Satuan</label>
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