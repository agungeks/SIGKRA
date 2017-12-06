<?php
@session_start(); // memulai session
include "dbconfig2.php"; // memanggil koneksi

if(@$_SESSION['admin'] || @$_SESSION['operator']) { // jika sudah ada session admin atau session operator, maka ke halaman index
?>

<?php 
 if(@$_SESSION['admin']) { //apabila sessionnya admin
  $userlogin = @$_SESSION['admin']; 

 } else if(@$_SESSION['operator']) { //apabila sessionnya admin
  $userlogin = @$_SESSION['operator'];
 }
 // menuliskan query mysql dimana kode_user = $userlogin
 // yaitu session pada script di atas
 $sql = mysql_query("select * from login where iduser = '$userlogin'") or die(mysql_error());
 
 //menjadikan data sebagai arrray
 $data = mysql_fetch_array($sql);
?>

<?php
require_once 'dbconfig.php';

if(isset($_GET['delete_id']))
    {
    // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM pekerjaan WHERE idpekerjaan =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: pekerjaan.php");
    }

?>
            <!-- //////////////////////////////////////////////////////////////////////////// -->
<?php include 'atas.php'; ?>
            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
                  
    </br>
    <center><a class="btn-floating btn-large waves-effect waves-light " href="forminputpekerjaan.php"><i class="mdi-content-add"></i></a></center>
    <div id="table-datatables">

      <table id="data-table-simple" class="responsive-table display" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>KEC</th>
                <th>BK</th>
                <th>IRT</th>
                <th>P/M</th>
                <th>PSN</th>
                <th>PNS</th>
                <th>TNI</th>
                <th>POL</th>
                <th>PDGNG</th>
                <th>PTN</th>
                <th>PTNK</th>
                <th>INDST</th>
                <th>KNSTR</th>
                <th>TRSPT</th>
                <th>KS</th>
                <th>BUMND</th>
                <th>BLH</th>
                <th>PKBN</th>
                <th>DSN</th>
                <th>GURU</th>
                <th>DKT</th>
                <th>PDG</th>
                <th>PDES</th>
                <th>WRST</th>
                <th>Satuan</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
                
        <tbody>

        <?php
            $stmt = $DB_con->prepare('SELECT * FROM pekerjaan ORDER BY idpekerjaan ASC');
            $stmt->execute();
    
            if($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                ?>
            <tr>
       		    <td><?php echo $idkec;?></td>
                <td><?php echo $belumbekerja;?></td>
                <td><?php echo $irt;?></td>
                <td><?php echo $pelajarmhs;?></td>
                <td><?php echo $pensiun;?></td>
                <td><?php echo $pns;?></td>
                <td><?php echo $tni;?></td>
                <td><?php echo $polisi;?></td>
                <td><?php echo $perdagangan;?></td>
                <td><?php echo $petani;?></td>
                <td><?php echo $peternak;?></td>
                <td><?php echo $insdustri;?></td>
                <td><?php echo $konstruksi;?></td>
                <td><?php echo $transportasi;?></td>
                <td><?php echo $karyawanswasta;?></td>
                <td><?php echo $bumnbumd;?></td>
                <td><?php echo $bhl;?></td>
                <td><?php echo $perkebunan;?></td>
                <td><?php echo $dosen;?></td>
                <td><?php echo $guru;?></td>
                <td><?php echo $dokter;?></td>
                <td><?php echo $pedagang;?></td>
                <td><?php echo $perangkatdesa;?></td>
                <td><?php echo $wiraswasta;?></td>
                <td><?php echo $satuan;?></td>
                <td><?php echo $tahun;?></td>
                
                <td>
                    <a class="btn-floating waves-effect waves-light " href="editpekerjaan.php?edit_id=<?php echo $row['idpekerjaan']; ?>">
                    <i class="mdi-content-content-cut"></i></a>

                    <a class="btn-floating btn-flat waves-effect waves-light pink accent-2 white-text" href="?delete_id=<?php echo $row['idpekerjaan']; ?>  title="click for delete" onclick="return confirm('Yakin Ingin Dihapus ?')"">
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
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Data Kosong
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

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->
<?php include 'bawah.php'; ?>
<?php
}else {
  header("location: index.php"); 
  //jika tidak maka kembali ke halaman login.php
} 
?>