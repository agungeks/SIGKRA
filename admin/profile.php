<?php include 'session.php'; ?>
<?php
require_once 'dbconfig.php';

if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT foto FROM profilkec WHERE idprofil =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink("images/kecamatan/".$imgRow['foto']);
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM profilkec WHERE idprofil =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: profile.php");
    }

?>
<?php include 'atas.php'; ?>
            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
                  
   
<!--                           <a class="btn-floating waves-effect waves-light "><i class="mdi-content-clear"></i></a>
                          <p>Tambah</p>
 -->   <!--  <a class="waves-effect waves-light  btn" >+ Tambah Data Baru</a> -->
    </br>
    <center><a class="btn-floating btn-large waves-effect waves-light " href="forminputprofilkec.php"><i class="mdi-content-add"></i></a></center>
    <div id="table-datatables">

      <table id="data-table-simple" class="responsive-table display" cellspacing="0" width="100%">

        <thead>

            <tr>
                <th>Nama Kec.</th>
                <!-- <th>Foto</th>
                 --><th>Email</th>
                <th>Alamat Kantor</th>
                <th>Desa</th>
                <th>Penduduk</th>
                <th>Geografis</th>
                <th>Industri</th>
                <th>Pertanian</th>
                <th>Pertambangan</th>
                <th>Pariwisata</th>
                <th>Pasar</th>
                <th>Aksi</th>
            </tr>
        </thead>
                
        <tbody>

        <?php
            $stmt = $DB_con->prepare('SELECT idprofil,idkec,foto,email,alamat,desa,penduduk,geografis,industri,pertanian,pertambangan,pariwisata,pasar FROM profilkec ORDER BY idprofil DESC');
            $stmt->execute();
    
            if($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                ?>
            <tr>
            	<td><?php echo $idkec;?></td>
              <!--   <td>
                    <img src="images/kecamatan/<?php echo $row['foto']; ?>" width="90px" height="90px" />
                </td> -->
                <td><?php echo $email;?></td>
                <td><?php echo $alamat;?></td>
                <td><?php echo $desa;?></td>
                <td><?php echo $penduduk;?></td>
                <td><?php echo $geografis;?></td>
                <td><?php echo $industri;?></td>
                <td><?php echo $pertanian;?></td>
                <td><?php echo $pertambangan;?></td>
                <td><?php echo $pariwisata;?></td>
                <td><?php echo $pasar;?></td>
                
                <td>
                    <a class="btn-floating waves-effect waves-light " href="editprofilkecamatan.php?edit_id=<?php echo $row['idprofil']; ?>">
                    <i class="mdi-content-content-cut"></i></a>

                    <a class="btn-floating btn-flat waves-effect waves-light pink accent-2 white-text" href="?delete_id=<?php echo $row['idprofil']; ?>  title="click for delete" onclick="return confirm('sure to delete ?')"">
                    <i class="mdi-content-clear"></i></a>
                </td>
            </tr>
            <?php
            }
            }
    else
    {
        ?>
        <div class="col-xs-12">
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
    }
        ?>
        </tbody>
    </table>
    </div>

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- LEFT RIGHT SIDEBAR NAV-->
<?php include 'bawah.php'; ?>